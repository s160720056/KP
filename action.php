<?php
include 'config.php';
$conn= connectToDatabase();
if(isset($_POST['submitLogin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM akun where username='$username' and password='$password'";
    $result = $conn->query($sql);
    $i=0;
    while ($row = $result->fetch_assoc()) {
        $i++;
    }
    if($i==1){
        header("location:customer.php");
    }
    else{
        header("location:login.php?status=error");
    }
}
else{
    header("location:index.php");
}

    
    

?>