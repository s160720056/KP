<?php
session_start();
include 'config.php';
$conn= connectToDatabase();
if(isset($_POST['submitLogin'])){
   $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
    $status="";
    $sql="SELECT * FROM users where email='$email' ";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        if ($row && password_verify($password, $row['password'])) {
            if ($row['STATUS'] == "customer") {
                header("location:index.php");
                //create sessiion
                $_SESSION['idUser']=$row['id'];
            } else {
                header("location:login.php?status=error");
            }
        } else {
            header("location:login.php?status=errorr");
        }
    }
}
else if(isset($_POST['register'])){
    $inputFirstName = $_POST['inputFirstName'];
    $inputLastName = $_POST['inputLastName'];
    $inputEmail = $_POST['inputEmail'];
    $noHP = $_POST['noHP'];
    $inputPassword = $_POST['inputPassword'];
    $inputPasswordConfirm = $_POST['inputPasswordConfirm'];
    $passwordHash = password_hash($inputPassword, PASSWORD_DEFAULT);
    
    //check users exist

    
    if($inputPassword==$inputPasswordConfirm && $inputPassword!="" && $inputPasswordConfirm!=""){
        $sql="SELECT * from users where email='$inputEmail'";
        $result = $conn->query($sql);    
        while ($row = $result->fetch_assoc()) {
            if($inputEmail==$row['email']){
                header("location:register.php?status=exist");
                exit;
            }
    
        }
        $sql = "INSERT INTO users (inputFirstName, inputLastName, email, password, passwordConfirm, STATUS) VALUES ('$inputFirstName', '$inputLastName', '$inputEmail', '$passwordHash', '$passwordConfirmHash', 'customer')";
        $result = $conn->query($sql);
        if($result){
            echo "Data inserted successfully";
            header("location:register.php?status=success");
        }else{
            echo "Data not inserted";
            header("location:register.php?status=error");
        }
    }
    else{
        echo "Password not match";
        header("location:register.php?status=error");
    }    
    
}
else{
    header("location:index.php");
}

    
    

?>