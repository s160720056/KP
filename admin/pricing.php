<?php
include 'config.php';
$conn = connectToDatabase();
$eror="";
$sql="SELECT * FROM pricing";
$result = $conn->query($sql);
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET['idDell'])){
       //delete image
        $idPricing="";
        $idPricing = $_GET['idDell'];
        $sql = "SELECT * FROM pricing WHERE idPricing = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idPricing);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $urlGambar = $row['urlGambar'];
            unlink($urlGambar);
        }
        $sql = "DELETE FROM pricing WHERE idPricing = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idPricing);
        $stmt->execute();
        // Redirect to prevent form resubmission
        header("Location: Pricing.php?error=success");
        exit();
    }
}
else if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['add'])) {
   
        $namaPricing = $_POST['namaPricing'];
        $target_dir = "image/pricing/";
        $target_file = $target_dir . basename($_FILES["namaPricing"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["namaPricing"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $eror.= "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $eror.= "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["namaPricing"]["size"] > 500000000) {
            $eror.= "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFileTypes)) {
            $eror.= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $eror.= "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["namaPricing"]["tmp_name"], $target_file)) {
                $eror.= "The file " . htmlspecialchars(basename($_FILES["namaPricing"]["name"])) . " has been uploaded.";

                $sql = "INSERT INTO pricing (urlGambar) VALUES ( ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $target_file);
                $stmt->execute();

                // Redirect to prevent form resubmission
                header("Location: Pricing.php?error=success");
                exit();
            } else {
                $eror.= "Sorry, there was an error uploading your file.";
            }
            header("Location: Pricing.php?error=$eror");
        }
        header("Location: Pricing.php?error=$eror");
        // echo "masuk";
    }
}

$isi = "<div class='card mb-4' style='margin-top:10%'>";

if (isset($_GET['idEdit'])) {
    // $id = $_GET['idEdit'];
    // $isi .= "<div class='card-header'>
    //     <div class='d-flex justify-content-between align-items-center'>
    //         <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Pricing Foto</h5>
    //     </div>
    // </div>
    // <div class='card-body'>
    //     <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
    //         <div class='mb-3'>
    //             <label for='namaPricing' class='form-label'>Nama Pricing</label>";

    // $sql = "SELECT * FROM Pricingfoto WHERE idPricingFoto = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i", $id);
    // $stmt->execute();
    // $result = $stmt->get_result();

    // while ($row = $result->fetch_assoc()) {
    //     $isi .= "<input type='hidden' name='idPricingFoto' value='" . $row['idPricingFoto'] . "'>
    //              <input type='text' class='form-control' id='namaPricing' value='" . $row['namaPricing'] . "' name='namaPricing' required>";
    // }
    // $isi .= "<input type='hidden' name='idDetail' value='".$id."'>
    //         </div>
    //         <input type='submit' name='edit' class='btn btn-primary' value='Edit Pricing'>
    //     </form>
    // </div>";
} else {
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Pricing</h5>
        </div>
    </div>
    <div class='card-body'>
    <p>";
    echo isset($_GET['error']) ? $_GET['error'] : "";
    $isi.="</p>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label for='namaPricing' class='form-label'>Upload Gambar</label>
                <input type='file' class='form-control' id='namaPricing' name='namaPricing' required>
             
            </div>
            <button type='submit' name='add' class='btn btn-primary'>Tambah Gambar</button>
        </form>
    </div>
    <div class='card-body'>
        <table id='datatablesSimple' class='table table-bordered mx-auto'>
            <thead>
                <tr>
                    <th>Foto </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";
            while ($row = $result->fetch_assoc()) {
                $isi .= "<tr>
                    <td><img src='" . $row['urlGambar'] . "' alt='Foto' style='width: 100px; height: 100px;'></td>
                    <td>
                        <button class='btn btn-danger' onclick='hapus(" . $row['idPricing'] . ")'>Hapus</button>
                    </td>
                </tr>";
            }

    $isi .= "</tbody>
        </table>
        <script>
        function hapus(id) {
            const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
            
            if (confirmation) {
                window.location.href = 'Pricing.php?idDell=' + id; 
            } else {
                alert('Hapus Dibatalkan');
            }
        }
        </script>
    </div>";
}

$isi .= "</div></div>";

include 'index.php';
?>
