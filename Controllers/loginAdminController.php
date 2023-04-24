<?php
    $class = new loginAdmin1();
    if(isset($_POST['submitValue'])) {
        $adminUsername = $_POST['username'];
        $adminPassword = $_POST['password'];
        $login_check = $class->loginAdmin($adminUsername, $adminPassword,'phucn1435');
        if(isset($_POST['remember']) && $_POST['remember']) {
            setcookie("user", $adminUsername, time()+(86400*7));
            setcookie("pass", $adminPassword, time()+(86400*7));
        }
    }

    if (isset($_POST['submitForgot'])) {
        $adminEmail = $_POST['email1'];
        $_SESSION['email'] = $adminEmail;
        $login_check1 = $class->forgotAdmin($adminEmail);
    }


?>