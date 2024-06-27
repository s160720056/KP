<?php
    session_start();
    include 'config.php';
    $conn=connnectToDatabase();
    if (isset($_POST['submit'])) {
        $idUser= $_SESSION['idUser'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $wa = $_POST['wa'];
        $service = $_POST['services'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        //echo all
        echo $idUser . "<br>". $name . "<br>". $phone . "<br>". $email . "<br>". $wa . "<br>". $service . "<br>". $date . "<br>". $time . "<br>";





        // insert to bookings table(tanggalBooking,waktuBooking,durasiBooking,namaBooking="",statusBooking=0,idJasa,idUser)
        // $sql = "INSERT INTO bookings (tanggalBooking,waktuBooking,durasiBooking,namaBooking,statusBooking,idJasa,idUser) VALUES ('$date','$time',1,'$name',0,$service,$idUser)";



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