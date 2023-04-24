<?php
class HomeController{
    public function TrangChu()
    {
        if (isset($_SESSION['dangnhap'])) {
            include("Views/Home/Trangchu.php"); 
        } else {
            header("Location: ./Login");
        }
    }

    public function Login() {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        include("Views/Log/login.php");
    } 

    public function returnHome() {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
        unset($_SESSION['email']);
        header("Location: ./Login");
    }
    
    public function Logout() {
        unset($_SESSION['dangnhap']);
        header("Location: ./Login");    
    }
  
    public function pageForgot(){
        include("Views/Log/forgotPassword.php");
    }

    public function forgotPassword(){
        header("Location: ./pageForgot");
    }   

    public function pageShowPw(){
        include("Views/Log/showPassword.php");
    }

    public function showPw(){
        header("Location: ./pageShowPw");
    }
}
?>