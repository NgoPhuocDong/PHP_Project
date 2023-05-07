<?php
    $class = new loginAdmin1();
    if(isset($_POST['submitValue'])) {
        $adminUsername = $_POST['username'];
        $adminPassword = $_POST['password'];
        $login_check = $class->loginAdmin($adminUsername, $adminPassword,'phucn1435');
        if(isset($_POST['remember']) && $_POST['remember']) {
            setcookie("user", $encoded_username, time()+(86400*7), '/', '', false, true);
            setcookie("pass", $encoded_password, time()+(86400*7), '/', '', false, true);
        }
    }

    if (isset($_POST['submitForgot'])) {
        $adminEmail = $_POST['email1'];
        $_SESSION['email'] = $adminEmail;
        $login_check1 = $class->forgotAdmin($adminEmail);
    }


?>