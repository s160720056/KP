<?php

include 'config.php';
$conn = connectToDatabase();
$tanggalBooking = date('Y-m-d');
$id = "";
$durasiBooking = 1;
$namaBooking = "";
$error="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $tanggalBooking = isset($_POST['tanggalBooking']) ? $_POST['tanggalBooking'] : "";
        $waktuBooking = isset($_POST['waktuBooking']) ? $_POST['waktuBooking'] : "";
        $durasiBooking = isset($_POST['durasiBooking']) ? $_POST['durasiBooking'] : "1";
        //convert $durasi booking to h:i:s
        // $durasiBooking=$durasiBooking.":00:00";

        $namaBooking = isset($_POST['namaBooking']) ? $_POST['namaBooking'] : "";
        $idJasa = isset($_POST['idJasa']) ? $_POST['idJasa'] : "";
        $status = 0;
        //check if date(12/09/2023) < today and time(13:00) < now
        $tanggalBooking = date('Y-m-d', strtotime($tanggalBooking));
        $waktuBooking = date('H:i:s', strtotime($waktuBooking));
        $tanggalBooking = $tanggalBooking . " " . $waktuBooking;
        $tanggalBooking = date('Y-m-d H:i:s', strtotime($tanggalBooking));
        $now = date('Y-m-d H:i:s');
        $error="";
       


        // echo $result->num_rows;
        if ($tanggalBooking < $now) {
            echo "<script>alert('Tanggal dan Waktu Sudah Lewat')</script>";
        } else {
            $tanggalBooking = date('Y-m-d ', strtotime($tanggalBooking));
        //      echo "$tanggalBooking<br>";
        // echo $waktuBooking;

            $sql = "SELECT * FROM bookings WHERE tanggalBooking=? AND waktuBooking=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $tanggalBooking, $waktuBooking);
            $stmt->execute();
            $result = $stmt->get_result();

          
            if ($result->num_rows > 0) {
                // Date and time are not available
                echo "<script>alert('Tanggal dan Waktu Sudah Terpakai')</script>";
                $error="Tanggal dan Waktu Sudah Terpakai";
            } else {
                // Date and time are available
                $error="else";
                $sql = "INSERT INTO `bookings` (`tanggalBooking`, `waktuBooking`, `durasiBooking`, `namaBooking`, `statusBooking`, `idJasa`,`idUser`) VALUES (?, ?, ?, ?,?, ?,0)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssdssi", $tanggalBooking, $waktuBooking, $durasiBooking, $namaBooking, $status, $idJasa);

                $stmt->execute();
                // Header redirection can be done here if needed.
                header("location:booking.php");
            }

     
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['idDell'])) {
        $id = $_GET['idDell'];
       //set status to 2
        $sql = "UPDATE bookings SET statusBooking='2' WHERE idBooking=$id";
        $result = $conn->query($sql);
        header("location:booking.php");
    }
}

$isi = "
<div class='card mb-4' style='margin-top:10%'>
    <div class='card-header'>
    <h1 class='text-center'>Error:$error</h1>
       <h1>";
if (isset($_GET['idEdit'])) {
    $id = $_GET['idEdit'];
    $isi .= "Edit Data Booking";
} else {
    $isi .= "Input Data Booking";
}

$isi .= "



       </h1>
    </div>
    <div class='card-body'>
        <form method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
            <div class='mb-3'>
                <label for='tanggalBooking' class='form-label'><b>Tanggal Booking</b></label>
                <input type='hidden' class='form-control' id='idBooking' name='idBooking' value='$id' required>
                <input type='date'  class='form-control' id='tanggalBooking' name='tanggalBooking' value='$tanggalBooking' required>
            </div>
            <div class='mb-3'>
            <label for='waktuBooking' class='form-label'><b>Waktu Booking</b></label>
            
            <select class='form-select' aria-label='Default select example' name='waktuBooking' required>
                <option selected value='Belum Memilih Waktu'>--Pilih Waktu--</option>
                <option value='09:00'>09:00</option>
                <option value='09:30'>09:30</option>
                <option value='10:00'>10:00</option>
                <option value='10:30'>10:30</option>
                <option value='11:00'>11:00</option>
                <option value='11:30'>11:30</option>
                <option value='12:00'>12:00</option>
                <option value='12:30'>12:30</option>
                <option value='13:00'>13:00</option>
                <option value='13:30'>13:30</option>
                <option value='14:00'>14:00</option>
                <option value='14:30'>14:30</option>
                <option value='15:00'>15:00</option>
                <option value='15:30'>15:30</option>
                <option value='16:00'>16:00</option>
                <option value='16:30'>16:30</option>
                <option value='17:00'>17:00</option>
                <option value='17:30'>17:30</option>
                <option value='18:00'>18:00</option>
                <option value='18:30'>18:30</option>
                <option value='19:00'>19:00</option>
                <option value='19:30'>19:30</option>
                <option value='20:00'>20:00</option>
                <option value='20:30'>20:30</option>
                <option value='21:00'>21:00</option>    
            </select>
            </div>
            <div class='mb-3'>
                <label for='durasiBooking' class='form-label'><b>Durasi Booking (Menit)</b></label>
                <input type='number' class='form-control' id='durasiBooking' name='durasiBooking'  min='1' value='$durasiBooking' required>
            </div>";
$isi .= "<div class='mb-3'>
                <label for='namaBooking' class='form-label'><b>Nama Booking</b></label>
                <input type='text' class='form-control' id='namaBooking' name='namaBooking' value='$namaBooking' required>
            <div class='mb-3'>
                <label for='tanggalBooking' class='form-label'><b>Jenis Jasa</b></label>
                <select class='form-select' aria-label='Default select example' name='idJasa' required>
                    ";
$sql = "SELECT * from jasa where status=1 ";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $isi .= "<option value='" . $row['idJasa'] . "'>" . $row['namaJasa'] . "</option>";
}
$isi .= "</select>
            </div>
            <input type='submit' class='btn btn-primary' value='";
if (isset($_GET['idEdit'])) {
    $id = $_GET['idEdit'];
    $isi .= "Selesai Edit' name='doneEdit'>";
} else {
    $isi .= "Submit' name='add'>";
}

$isi .= "
        </form>
    </div>
</div>";


include 'index.php';
?>
