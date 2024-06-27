<?php
session_start();
if(isset($_POST['register'])){
    $inputFirstName = $_POST['inputFirstName'];
    $inputLastName = $_POST['inputLastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $passwordConfirmHash = password_hash($passwordConfirm, PASSWORD_DEFAULT);
    $conn = mysqli_connect("localhost", "root", "", "kp_famousstudio");
    $sql = "INSERT INTO users (inputFirstName, inputLastName, email, password, passwordConfirm) VALUES ('$inputFirstName', '$inputLastName', '$email', '$passwordHash', '$passwordConfirmHash')";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Data inserted successfully";

    }else{
        echo "Data not inserted";
    }

    echo "<script>alert('Data inserted successfully');window.location.href='login.php';</script>";

}
else if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost", "root", "", "kp_famousstudio");
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                if($row['STATUS']!='customer'){
                 
                echo "Login successful";
                $_SESSION['user'] = $email;
                echo "<script>alert('Login successful');window.location.href='index.php';</script>";
                }else{
                    echo "<script>alert('Wrong Email or Password');window.location.href='login.php';</script>";
                }
            }else{
                echo $row['password'];
                echo "Password incorrect";
               
            }
        }
    }else{
        echo "Email not found";
            echo "<script>alert('Email not found');window.location.href='login.php';</script>";
    }
    //create sessuin user
  
    // header("location: index.php");
}



?>