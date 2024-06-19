<?php
include 'config.php';
$conn = connectToDatabase();

$sql = "SELECT * FROM kategorifoto";
$result = $conn->query($sql);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        $namaKategori = $_POST['namaKategori'];
        $idKategoriFoto = $_POST['idKategoriFoto'];
        
        $sql = "UPDATE kategorifoto SET namaKategori = ? WHERE idKategoriFoto = ?";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("si", $namaKategori, $idKategoriFoto);
        $hasil->execute();

        // Redirect to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else if (isset($_POST['add'])) {
        $namaKategori = $_POST['namaKategori'];

        $sql = "INSERT INTO kategorifoto (namaKategori) VALUES (?)";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("s", $namaKategori);
        $hasil->execute();

        // Redirect to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['idDell'])) {
        $idKategoriFoto = $_GET['idDell'];

        $sqlCheck = "SELECT * FROM jasa WHERE idKategoriFoto = ?";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bind_param("i", $idKategoriFoto);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            // Jasas are associated with this category, cannot delete
            $sqlDelete = "UPDATE kategorifoto SET status = 2 WHERE idKategoriFoto = ?";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $idKategoriFoto);
            $stmtDelete->execute();
        } else {
            // No associated Jasas, safe to delete the category
            $sqlDelete = "UPDATE kategorifoto SET status = 2 WHERE idKategoriFoto = ?";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $idKategoriFoto);
            $stmtDelete->execute();
        }
        
        // Redirect to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else if (isset($_GET['add'])) {
        // Handle form submission and insert data into the database
        $namaKategori = $_GET['namaKategori'];

        $sql = "INSERT INTO kategorifoto (namaKategori, status) VALUES (?, 1)";
        $hasil = $conn->prepare($sql);
        $hasil->bind_param("s", $namaKategori);
        $hasil->execute();

        // Redirect to prevent form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

$isi = "<div class='card mb-4' style='margin-top:10%'>";

if (isset($_GET['idEdit'])) {
    $id = $_GET['idEdit'];
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Kategori Foto</h5>
        </div>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='namaKategori' class='form-label'>Nama Kategori</label>";
    $sql = "SELECT * FROM kategorifoto WHERE idKategoriFoto = $id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $isi .= "<input type='hidden' name='idKategoriFoto' value='" . $row['idKategoriFoto'] . "'><input type='text' class='form-control' id='namaKategori' value='" . $row['namaKategori'] . "' name='namaKategori' required>";
    }
    $isi .= "
            </div>
            <input type='submit' name='edit' class='btn btn-primary' value='Edit Kategori'>
        </form>
    </div>";
} else {
    $isi .= "<div class='card-header'>
        <div class='d-flex justify-content-between align-items-center'>
            <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Kategori Foto</h5>
        </div>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='namaKategori' class='form-label'>Nama Kategori</label>
                <input type='text' class='form-control' id='namaKategori' name='namaKategori' required>
            </div>
            <button type='submit' name='add' class='btn btn-primary'>Tambah Kategori</button>
        </form>
    </div>
    <div class='card-body'>
        <table id='datatablesSimple' class='table table-bordered mx-auto'>
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        $namaKategori = $row['namaKategori'];
        $isi .= "<tr>
                <td>" . $namaKategori . "</td>
                <td>
                    <a href='foto.php?idEdit=" . $row['idKategoriFoto'] . "' class='btn btn-primary'>Edit</a>
                      <a href='fotodetil.php?idDetail=" . $row['idKategoriFoto'] . "' class='btn btn-primary'>Detail</a>
                    <a onclick='hapus(" . $row['idKategoriFoto'] . ")' class='btn btn-danger'>Delete</a>
                </td>
            </tr>";
    }

    $isi .= "</tbody>
        </table>
        <script>
        function hapus(id) {
            const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
            
            if (confirmation) {
                window.location.href = 'foto.php?idDell=' + id; 
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
