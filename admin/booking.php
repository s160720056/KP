<?php
$bulanFilter = $tahunFilter = "";

include 'config.php';
$conn = connectToDatabase();
$sql = "SELECT * 
        FROM bookings b 
        INNER JOIN jasa j ON j.idJasa = b.idJasa 
        LEFT JOIN users u ON u.id = b.idUser 
        WHERE b.tanggalBooking >= CURDATE()
        ORDER BY b.tanggalBooking DESC, b.waktuBooking DESC, b.idBooking DESC";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['findFilter'])) {
        $bulanFilter = $_POST['bulanFilter'];
        $tahunFilter = $_POST['tahunFilter'];
        if ($bulanFilter == "" && $tahunFilter == "") {
            $sql = "SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa ";
        } else if ($bulanFilter == "" && $tahunFilter != "") {
            $sql = "SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa where year(b.tanggalBooking) = '$tahunFilter'";
        } else if ($bulanFilter != "" && $tahunFilter == "") {
            $sql = "SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa where month(b.tanggalBooking) = '$bulanFilter'";
        } else {
            $sql = "SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa where month(b.tanggalBooking) = '$bulanFilter' and year(b.tanggalBooking) = '$tahunFilter'";
        }
        $result = $conn->query($sql);
    } else if (isset($_POST['changeStatus'])) {
        $idBooking = $_POST['idBooking'];
        $newStatus = $_POST['newStatus'];
        $error="";
        $updateSql = "UPDATE bookings SET statusBooking = ? WHERE idBooking = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("si", $newStatus, $idBooking);
        $stmt->execute();
        $error="Status berhasil diubah";
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }
   
}


$isi = "  
<div class=''>
<div style='text-align: center;'>
    <label for='nothing'>////////////// PENCARIAN BULAN/TAHUN /////////////</label>
</div>
<BR>
<form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
    <label for='bulan'>Bulan</label>
    <select class='form-select' id='bulanFilter' name='bulanFilter'>
        <option value=''>Semua Bulan</option>";
$bulanOptions = [
    1 => 'Januari',
    2 => 'Ferbuari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
];
foreach ($bulanOptions as $bulanValue => $bulanLabel) {
    $selected = ($bulanFilter == $bulanValue) ? 'selected' : '';
    $isi .= "<option value='$bulanValue' $selected>$bulanLabel</option>";
}
$isi .= "
    </select>
    </div>
<div class='mb-3'>
    <label for='tahunFilter'>Tahun</label>
    <select class='form-select' id='tahunFilter' name='tahunFilter'>
        <option value=''>Semua Tahun</option>";

$tahunOptions = [
    2020, 2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029, 2030
];
foreach ($tahunOptions as $tahunValue) {
    $selected = ($tahunFilter == $tahunValue) ? 'selected' : '';
    $isi .= "<option value='$tahunValue' $selected>$tahunValue</option>";
}
$isi .= "
    </select>
</div>
  <button type='submit' name='findFilter' class='btn btn-primary' id='filterButton'>Cari</button>
  </form>";

$isi .= "
<div class='card-header' >
    <div class='d-flex justify-content-between align-items-center'>
        <h5 class='card-title m-0'><i class='fas fa-table me-1'></i> Daftar Data Booking</h5>
        <a href='actionBooking.php' class='btn btn-primary'>Tambah Booking</a>
    </div>
</div>
<div class='card-body' >
    <table id='datatablesSimple' class='table table-bordered mx-auto'>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Menit</th>
                <th>Durasi</th>
                <th>Atas Nama</th>
                <th>Appointment type</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Duration</th>
                <th>Nama Booking</th>
                <th>Appointment type</th>
                <th>Status</th>
            </tr>
        </tfoot>
        <tbody>";

        while ($row = $result->fetch_assoc()) {
            $waktuBooking = substr($row['waktuBooking'], 0, 5);
            $dateString = $row['tanggalBooking'];
            $dateTime = new DateTime($dateString);
            $dmyFormat = $dateTime->format("d-m-Y");
        
            $inputFirstName = !empty($row['inputFirstName']) ? $row['inputFirstName'] : '';
            $inputLastName = !empty($row['inputLastName']) ? $row['inputLastName'] : '';
            $email = !empty($row['email']) ? $row['email'] : '';
        
            $isi .= "<tr>
                <td>" . $dmyFormat . "</td>
                <td>" . $waktuBooking . " </td>
                <td>" . $row['durasiBooking'] . " Menit </td>
                <td>";
            
            if ($inputFirstName || $inputLastName || $email) {
                $isi .= $inputFirstName . " " . $inputLastName . " | <b>" . $email . "</b><br>".$row['namaBooking']."";
            }
            else{
                $isi .= $row['namaBooking'];
            }
            
            $isi .= "</td>
                <td>" . $row['namaJasa'] . "</td>
                <td>";
            
            if ($row['statusBooking'] == 0) {
                $isi .= "<span class='badge bg-warning'>Pending</span>";
            } else if ($row['statusBooking'] == 1) {
                $isi .= "<span class='badge bg-success'>Approved</span>";
            } else if ($row['statusBooking'] == 2) {
                $isi .= "<span class='badge bg-danger'>Canceled</span>";
            }

            
            $isi .= "
            <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' style='display:inline;'>
                        <input type='hidden' name='idBooking' value='" . $row['idBooking'] . "'>
                        <select name='newStatus' class='form-select form-select-sm d-inline' style='width:auto;'>
                            <option value='0'" . ($row['statusBooking'] == 0 ? " selected" : "") . ">Pending</option>
                            <option value='1'" . ($row['statusBooking'] == 1 ? " selected" : "") . ">Approved</option>
                            <option value='2'" . ($row['statusBooking'] == 2 ? " selected" : "") . ">Canceled</option>
                        </select>
                        <button name='changeStatus' type='submit' class='btn btn-sm btn-secondary' onclick='return confirm(\"Are you sure you want to change status?\")'>Change Status</button>
                    </form>
            </td>
                <td>
                    <a href='actionBooking.php?idEdit=" . $row['idBooking'] . "' class='btn btn-primary'>Edit</a>
                    <a onclick='hapus(" . $row['idBooking'] . ")' class='btn btn-danger'>Delete</a>
                    
                </td>
            </tr>";
        }
        

$isi .= "
        </tbody>
    </table>
</div>
</div>
<script>
function hapus(id) {
    const confirmation = confirm('Apakah kamu yakin untuk menghapus data?');
    if (confirmation) {
        window.location.href = 'actionBooking.php?idDell=' + id; 
    } else {
        alert('Hapus Dibatalkan');
    }
}

</script>";


include 'index.php';
?>