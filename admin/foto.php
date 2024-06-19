<?php
include 'config.php';
$conn = connectToDatabase();

$sql = "SELECT * FROM jasa where status=1";
$result = $conn->query($sql);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $namaJasa = $_POST['namaJasa'];
        $idJasa = $_POST['idJasa'];
        // Perform the database update operation using the provided data
        $sql = "UPDATE `Jasa` SET `namaJasa` = ? WHERE idJasa = ?";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("si", $namaJasa, $idJasa);
        $hasil->execute();

        // Redirect to the same page to prevent form resubmission on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else if (isset($_POST['add'])) {
        // Handle form submission and insert group data into the database
        $namaJasa = $_POST['namaJasa'];

        // Perform the database insert operation using the provided data
        $sql = "INSERT INTO `Jasa` (`namaJasa`,`status`) VALUES (?,1)";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("s", $namaJasa);
        $hasil->execute();

        // Redirect to the same page to prevent form resubmission on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['idDell'])) {
        $idJasa = $_GET['idDell'];

        // Check if there are any associated Jasas in the Jasa
        $sqlCheck = "SELECT * FROM bookings WHERE idJasa = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $idJasa);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Jasas are associated with this Jasa, cannot delete
            $sqlDelete = "UPDATE Jasa SET status=2 WHERE idJasa = ?";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $idJasa);
            $stmtDelete->execute();
            // echo "<script>alert('Tidak Bisa Menghapus Data, Pastikan Dalam Jasa sudah Tidak ada Jasa!')</script>";
        } else {
            // No associated Jasas, safe to delete the Jasa
            //update jasa set status=2 where idJasa=?
            $sqlDelete = "UPDATE Jasa SET status=2 WHERE idJasa = ?";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $idJasa);
            $stmtDelete->execute();


            // $sqlDelete = "DELETE FROM Jasa WHERE idJasa = ?";
            // $stmtDelete = $conn->prepare($sqlDelete);
            // $stmtDelete->bind_param("i", $idJasa);
            // $stmtDelete->execute();

            // // Redirect to the same page to prevent form resubmission on refresh
            // header("Location: " . $_SERVER['PHP_SELF']);
            // exit();
        }
    } else if (isset($_GET['add'])) {
        // Handle form submission and insert group data into the database
        $namaJasa = $_GET['namaJasa'];

        // Perform the database insert operation using the provided data
        $sql = "INSERT INTO `Jasa` (`namaJasa`,`status`) VALUES (?,1)";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("s", $namaJasa);
        $hasil->execute();

        // Redirect to the same page to prevent form resubmission on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
$isi = "<div class='card mb-4' style='margin-top:10%'>";

if (isset($_GET['idEdit'])) {
    $id = $_GET['idEdit'];
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Jasa</h5>
        </div>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='namaJasa' class='form-label'>Nama Jasa</label>";
    $sql = "SELECT * FROM Jasa WHERE idJasa = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $isi .= "<input type='hidden' name='idJasa' value='" . $row['idJasa'] . "'><input type='text' class='form-control' id='namaJasa' value='" . $row['namaJasa'] . "' name='namaJasa' required>";
    }
    $isi .= "
            </div>
            <input type='submit' name='edit' class='btn btn-primary' value='Edit Jasa'>
        </form>
    </div>";
} else {
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Jasa</h5>
        </div>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='namaJasa' class='form-label'>Nama Jasa</label>
                <input type='text' class='form-control' id='namaJasa' name='namaJasa' required>
            </div>
            <button type='submit' name='add' class='btn btn-primary'>Tambah Jasa</button>
        </form>
    </div>
    <div class='card-body'>
        <table id='datatablesSimple' class='table table-bordered mx-auto'>
            <thead>
                <tr>
                    <th>Nama Jasa</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        $namaJasa = $row['namaJasa'];
        $isi .= "<tr>
                <td>" . $namaJasa . "</td>
                <td>
                    <a href='Jasa.php?idEdit=" . $row['idJasa'] . "' class='btn btn-primary'>Edit</a>
                    <a onclick='hapus(" . $row['idJasa'] . ")' class='btn btn-danger'>Delete</a>
                </td>
            </tr>";
    }

    $isi .= "</tbody>
        </table>
        <script>
        function hapus(id) {
            const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
            
            if (confirmation) {
                window.location.href = 'Jasa.php?idDell=' + id; 
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
