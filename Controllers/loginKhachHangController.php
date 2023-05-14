<?php
    $class = new loginKhachHang();
    if(isset($_POST['submitValue'])) {
        $khachhangUsername = $_POST['username'];
        $khachhangPassword = $_POST['password'];
        $login_check = $class->loginAdmin($khachhangUsername, $khachhangPassword,'phucn1435');
        if(isset($_POST['remember']) && $_POST['remember']) {
            setcookie("userKH", $khachhangUsername, time()+(86400*7), '/', '', false, true);
            setcookie("passKH", $khachhangPassword, time()+(86400*7), '/', '', false, true);
        }
    }

    if (isset($_POST['submitForgot'])) {
        $adminEmail = $_POST['email1'];
        $_SESSION['email'] = $adminEmail;
        $login_check1 = $class->forgotAdmin($adminEmail);
    }


?>