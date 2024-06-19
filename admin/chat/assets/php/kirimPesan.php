<?php

session_start();
include 'koneksi.php';

    $pengirim = $_SESSION['user'];

$pesan = $_POST['pesan'];

    $penerima = $_POST['temanObrolan'];
    $sql = "INSERT INTO chat (pengirim, penerima, chat, file) VALUES ('$pengirim', '$penerima', '$pesan', '$filename') ";

if (mysqli_query($conn, $sql) === TRUE){
    $output = 1;
}else{
    $output = 0;
}

echo $output;

?>