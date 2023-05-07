<?php
include_once("Models/TaiKhoanNhanVien.php");
include_once("Models/NhanVien.php");
include_once("Models/forgotPassword.php");


class ProfileController{
    private $model;
    private $db;
    private $tennhanvien;
    private $forgot;
    
    public function __construct(){
        $this->model = new TaiKhoanNhanVien();
        $this->db = new Database();
        $this->tennhanvien = new NhanVien;
        $this->forgot = new changePassword; 
    }
    
    public function DanhSach()
    {
        $result = $this->model->DanhSach1();
        include 'Views/Profile/MyProfile.php';
        return $result;
    }

    public function MyProfile() {
        $this->DanhSach();
    }

    public function DoiMatKhau() {
        $alert = "";
        if(isset($_POST['submit'])) {
            if($_POST['old-password'] == $_SESSION['pass'] && $_POST['confirm-password'] == $_POST['new-password'] ) {
               $this->forgot->CapNhatMatKhau1($_SESSION['dangnhap'],$_POST['new-password']);
               $alert = "<span style='color: green; padding-bottom: 10px;'>Đổi mật khẩu thành công.</span>";
            } elseif(empty($_POST['old-password']) || empty($_POST['confirm-password']) || empty($_POST['new-password']))  {
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống.</span>";
            } elseif($_POST['confirm-password'] != $_POST['new-password']) {
               $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>Xác nhận mật khẩu thất bại.</span>";
            } elseif (strlen($_POST['new-password']) < 8) {
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>Không được nhỏ hơn 8 kí tự.</span>";
            }else {
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>Sai mật khẩu hiện tại.</span>";
            } 
        }
        include("Views/Profile/DoiMatKhau.php");
    }
    
}