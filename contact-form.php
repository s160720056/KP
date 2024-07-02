<?php
    session_start();
    include 'config.php';
    $conn=connectToDatabase();
    if (isset($_POST['submit'])) {
        $idUser= $_SESSION['idUser'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $wa = $_POST['wa'];
        $service = $_POST['services'];//jasa
        $date=$_POST['date'];
        $time=$_POST['time'];
        $durasi = $_POST['durasi'];

//INSERT INTO `bookings`(`idBooking`, `tanggalBooking`, `waktuBooking`, `durasiBooking`, `namaBooking`, `statusBooking`, `idJasa`, `idUser`)
// VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])
$sql = "INSERT INTO `bookings`(`tanggalBooking`, `waktuBooking`, `durasiBooking`, `namaBooking`, `statusBooking`, `idJasa`, `idUser`) 
VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
      // Check if preparing the statement succeeded
if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
}

// Assuming "0" is a default value for statusBooking; use 's' for string, 'd' for double, 'i' for integer
$status = "0";
$stmt->bind_param("ssdssii", $date, $time, $durasi, $name, $status, $service, $idUser);

// Execute the statement
$stmt->execute();

// Check if execution succeeded
if ($stmt->affected_rows > 0) {
    echo "New record created successfully";
    //echo all
    echo "$idUser $name $phone $email $wa $service $date $time $durasi $status";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();



















//  $wa = urlencode($wa);
// $name = urlencode($name);
// $email = urlencode($email);
// $service = urlencode($service);
// $date = urlencode($date);
// $time = urlencode($time);

// header("Location: https://api.whatsapp.com/send?phone=$wa&text=Halo kak Saya Ingin Booking %0A%0DNama:%20$name%0A%0DEmail:%20$email%20%0A%0DLayanan:%20$service%20%0A%0DTanggal%20Pesan:%20$date%0A%0DJam%20Booking:%20$time");

    }else{
        echo"<script>
                window.location=history.go(-1);
            </script>";
    }


?>