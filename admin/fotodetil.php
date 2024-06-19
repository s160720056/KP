<?php
include 'config.php';
$conn = connectToDatabase();
$eror="";
// Get the 'idDetail' from either GET or POST request
$id = isset($_GET['idDetail']) ? $_GET['idDetail'] : (isset($_POST['idDetail']) ? $_POST['idDetail'] : 0);

// Fetch fotoDetail data
$sql = "SELECT * FROM fotoDetail WHERE idFoto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch kategoriFoto data
$name = "";
$sql = "SELECT namaKategori FROM kategorifoto WHERE idKategoriFoto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result2 = $stmt->get_result();
while ($row = $result2->fetch_assoc()) {
    $name = $row['namaKategori'];
}
if($_SERVER["REQUEST_METHOD"] == "GET"){
    if(isset($_GET['idDell'])){
       //delete image
       $idFoto="";
        $idFotoDetail = $_GET['idDell'];
        $sql = "SELECT * FROM fotoDetail WHERE idFotoDetail = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idFotoDetail);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $urlGambar = $row['urlGambar'];
            $idFoto = $row['idFoto'];
            unlink($urlGambar);
        }
        $sql = "DELETE FROM fotoDetail WHERE idFotoDetail = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idFotoDetail);
        $stmt->execute();
        // Redirect to prevent form resubmission
        header("Location: fotodetil.php?idDetail=".$idFoto." ");
        exit();
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        // $namaKategori = $_POST['namaKategori'];
        // $idKategoriFoto = $_POST['idKategoriFoto'];

        // $sql = "UPDATE kategorifoto SET namaKategori = ? WHERE idKategoriFoto = ?";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("si", $namaKategori, $idKategoriFoto);
        // $stmt->execute();

        // // Redirect to prevent form resubmission
        // header("Location: " . $_SERVER['PHP_SELF']);
        // exit();
    } else if (isset($_POST['add'])) {
        $namaKategori = $_POST['namaKategori'];
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["namaKategori"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["namaKategori"]["tmp_name"]);
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
        if ($_FILES["namaKategori"]["size"] > 500000000) {
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
            if (move_uploaded_file($_FILES["namaKategori"]["tmp_name"], $target_file)) {
                $eror.= "The file " . htmlspecialchars(basename($_FILES["namaKategori"]["name"])) . " has been uploaded.";

                $sql = "INSERT INTO fotoDetail (idFoto, urlGambar) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $id, $target_file);
                $stmt->execute();

                // Redirect to prevent form resubmission
                header("Location: fotodetil.php?idDetail=".$id." ");
                exit();
            } else {
                $eror.= "Sorry, there was an error uploading your file.";
            }
        }
        header("Location: fotodetil.php?idDetail=".$id." ");
    }
}

$isi = "<div class='card mb-4' style='margin-top:10%'>";

if (isset($_GET['idEdit'])) {
    // $id = $_GET['idEdit'];
    // $isi .= "<div class='card-header'>
    //     <div class='d-flex justify-content-between align-items-center'>
    //         <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Kategori Foto</h5>
    //     </div>
    // </div>
    // <div class='card-body'>
    //     <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
    //         <div class='mb-3'>
    //             <label for='namaKategori' class='form-label'>Nama Kategori</label>";

    // $sql = "SELECT * FROM kategorifoto WHERE idKategoriFoto = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i", $id);
    // $stmt->execute();
    // $result = $stmt->get_result();

    // while ($row = $result->fetch_assoc()) {
    //     $isi .= "<input type='hidden' name='idKategoriFoto' value='" . $row['idKategoriFoto'] . "'>
    //              <input type='text' class='form-control' id='namaKategori' value='" . $row['namaKategori'] . "' name='namaKategori' required>";
    // }
    // $isi .= "<input type='hidden' name='idDetail' value='".$id."'>
    //         </div>
    //         <input type='submit' name='edit' class='btn btn-primary' value='Edit Kategori'>
    //     </form>
    // </div>";
} else {
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Foto " . $name . "</h5>
        </div>
    </div>
    <div class='card-body'>
    <p>".$eror."</p>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' enctype='multipart/form-data'>
            <div class='mb-3'>
                <label for='namaKategori' class='form-label'>Upload Gambar</label>
                <input type='file' class='form-control' id='namaKategori' name='namaKategori' required>
                <input type='hidden' name='idDetail' value='".$id."'>
            </div>
            <button type='submit' name='add' class='btn btn-primary'>Tambah Kategori</button>
        </form>
    </div>
    <div class='card-body'>
        <table id='datatablesSimple' class='table table-bordered mx-auto'>
            <thead>
                <tr>
                    <th>Foto " . $name . "</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

    $sql = "SELECT * FROM fotoDetail WHERE idFoto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $namaKategori = $row['urlGambar'];
        $isi .= "<tr>
                <td><img src='" . $namaKategori . "' width='100px' height='100px'></td>
                <td>
                
                    <a onclick='hapus(" . $row['idFotoDetail'] . ")' class='btn btn-danger'>Delete</a>
                </td>
            </tr>";
    }

    $isi .= "</tbody>
        </table>
        <script>
        function hapus(id) {
            const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
            
            if (confirmation) {
                window.location.href = 'fotodetil.php?idDell=' + id; 
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
