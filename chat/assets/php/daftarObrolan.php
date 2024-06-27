<?php

session_start();
include 'koneksi.php';
$username = $_SESSION['user'];
$output = array();
$var = array();

$sql = "SELECT * FROM users WHERE email != '$username'";
$query = mysqli_query($conn, $sql);

while ( $data = mysqli_fetch_array($query) ){
    $var['username'] = $username;
    $var['namaLengkap'] = $data['inputFirstName'].' '.$data['inputLastName'].'<br><small>'.$data['email'].'</small>';
    $var['temanObrolan'] = $data['email'];
  

    array_push($output, $var);
}

echo json_encode($output);

?>