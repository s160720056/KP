<?php
// File process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];

    // Lakukan apa pun yang diperlukan dengan data yang diterima
    // Misalnya, simpan ke database, kirim email, dll.

    // Contoh respon - bisa berupa pesan sukses
    echo "Pesan dari $nama: $pesan berhasil diterima!";
}
?>
