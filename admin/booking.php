<?php
$bulanFilter = $tahunFilter = "";

include 'config.php';
$conn = connectToDatabase();
$sql = "SELECT * from bookings b inner join jasa j on j.idJasa=b.idJasa order by b.tanggalBooking desc , b.waktuBooking desc ";
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
  </form>



</div>
<div class='card mb-4' style='margin-top:10%'>

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
                                           <th>Date</th>
                                           <th>Time</th>
                                           <th>Duration</th>
                                           <th>Nama Booking</th>
                                           <th>Team</th>
                                           <th>Appointment type</th>
                                           <th>Status</th>
                                         
                                       </tr>
                                   </thead>
                                   <tfoot>
                                       <tr>
                                             <th>Date</th>
                                             <th>Time</th>
                                             <th>Duration</th>
                                             <th>Nama Booking</th>
                                             <th>Team</th>
                                             <th>Appointment type</th>
                                             <th>Status</th>
                                       </tr>
                                   </tfoot>
                                    <tbody>
                                       ";


                                    while ($row = $result->fetch_assoc()) {
                                        //remove $waktubooking	17:00:00.000000 to 17:00
                                        $waktuBooking = substr($row['waktuBooking'], 0, 5);
                                           $dateString=$row['tanggalBooking'];
                                        $dateTime = new DateTime($dateString);
                                        $dmyFormat = $dateTime->format("d-m-Y");

                                        $isi .= "<tr>
                                                <td>" . $dmyFormat . "</td>
                                                <td>" . $waktuBooking . " </td>
                                                <td>" . $row['durasiBooking'] . " Jam </td>
                                                <td>" . $row['namaBooking'] . "</td>
                                                <td></td>
                                                <td>" . $row['namaJasa'] . "</td>
                                                <td>" . $row['statusBooking'] . "</td>
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
                                    
                                    window.location.href = 'actionBooking.php?idDell='+id; 
                                } else {
                                    
                                    
                                    alert('Hapus Dibatalkan');
                                }
                            }

                            </script>

                        ";



include 'index.php';
$isi = "<script>


</script>
";