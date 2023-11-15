<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $wa = $_POST['wa'];
        $service = $_POST['services'];
        $note = $_POST['note'];

        header("location:https://api.whatsapp.com/send?phone=$wa&text=Nama:%20$name%0A%0DEmail:%20$email%20%0A%0DLayanan:%20$service%20%0A%0DCatatan:%20$note");
    }else{
        echo"<script>
                window.location=history.go(-1);
            </script>";
    }


?>