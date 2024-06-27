<?php
include 'config.php';
$conn = connectToDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $namaKelompok = $_POST['namaKelompok'];
        $idKelompok = $_POST['idKelompok'];
        // Perform the database update operation using the provided data
        $sql = "UPDATE `kelompok` SET `namaKelompok` = ? WHERE idKelompok = ?";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("si", $namaKelompok, $idKelompok);
        $hasil->execute();

        // Redirect to the same page to prevent form resubmission on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else if (isset($_POST['add'])) {
        // Handle form submission and insert group data into the database
        $namaKelompok = $_POST['namaKelompok'];

        // Perform the database insert operation using the provided data
        $sql = "INSERT INTO `kelompok` (`namaKelompok`) VALUES (?)";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("s", $namaKelompok);
        $hasil->execute();

        // Redirect to the same page to prevent form resubmission on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['idDell'])) {
        $idKelompok = $_GET['idDell'];

        // Check if there are any associated murids in the kelompok
        $sqlCheck = "SELECT * FROM murid WHERE idKelompok = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $idKelompok);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Murids are associated with this kelompok, cannot delete
            echo "<script>alert('Tidak Bisa Menghapus Data, Pastikan Dalam Kelompok sudah Tidak ada Murid!')</script>";
        } else {
            // No associated murids, safe to delete the kelompok
            $sqlDelete = "DELETE FROM kelompok WHERE idKelompok = ?";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $idKelompok);
            $stmtDelete->execute();

            // Redirect to the same page to prevent form resubmission on refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    } else if (isset($_GET['add'])) {
        // Handle form submission and insert group data into the database
        $namaKelompok = $_GET['namaKelompok'];

        // Perform the database insert operation using the provided data
        $sql = "INSERT INTO `kelompok` (`namaKelompok`) VALUES (?)";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("s", $namaKelompok);
        $hasil->execute();

        // Redirect to the same page to prevent form resubmission on refresh
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

$sql = "SELECT * FROM kelompok";
$result = $conn->query($sql);

$isi = "<div class='card mb-4' style='margin-top:10%'>";

if (isset($_GET['idEdit'])) {
    $id = $_GET['idEdit'];
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Kelompok</h5>
        </div>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='namaKelompok' class='form-label'>Nama Kelompok</label>";
    $sql = "SELECT * FROM kelompok WHERE idKelompok = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $isi .= "<input type='hidden' name='idKelompok' value='" . $row['idKelompok'] . "'><input type='text' class='form-control' id='namaKelompok' value='" . $row['namaKelompok'] . "' name='namaKelompok' required>";
    }
    $isi .= "
            </div>
            <input type='submit' name='edit' class='btn btn-primary' value='Edit Kelompok'>
        </form>
    </div>";
} else {
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Kelompok</h5>
        </div>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='namaKelompok' class='form-label'>Nama Kelompok</label>
                <input type='text' class='form-control' id='namaKelompok' name='namaKelompok' required>
            </div>
            <button type='submit' name='add' class='btn btn-primary'>Tambah Kelompok</button>
        </form>
    </div>
    <div class='card-body'>
        <table id='datatablesSimple' class='table table-bordered mx-auto'>
            <thead>
                <tr>
                    <th>Nama Kelompok</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        $namaKelompok = $row['namaKelompok'];
        $isi .= "<tr>
                <td>" . $namaKelompok . "</td>
                <td>
                    <a href='kelompok.php?idEdit=" . $row['idKelompok'] . "' class='btn btn-primary'>Edit</a>
                    <a onclick='hapus(" . $row['idKelompok'] . ")' class='btn btn-danger'>Delete</a>
                </td>
            </tr>";
    }

    $isi .= "</tbody>
        </table>
        <script>
        function hapus(id) {
            const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
            
            if (confirmation) {
                window.location.href = 'kelompok.php?idDell=' + id; 
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
