<?php 
    class CheckLoginController {
        public function CheckLogin() {
            if(!isset($_SESSION['dangnhap'])) {
                header("Locatin: Home/Login");
            }
        }
    }
?>