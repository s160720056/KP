<?php
if(isset($_GET['status'])){
    echo "<script>alert('username atau password salah')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="action.php">
        <div style="text-align: center;">
        <input type="text" placeholder="username" name="username"><br>
        <input type="text" placeholder="password" name="password"><br>
        <input type="submit" value="login" name="submitLogin">
        </div>
    </form>
</body>
</html>