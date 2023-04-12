<?php
// include_once("Models/SanPham.php");

class LoaiSanPhamController {  
    /* */
    public $model;

    public function DanhSach()
    {
    include 'Views/LoaiSanPham/DanhSach.php';
    }   
    public function ThemMoi(){
    $db =  new Database();
    if(isset($_POST['submit'])){
        $tenloaisanpham = $_POST['tenloaisanpham'];
        $db->insert($tenloaisanpham);
       
        header('Location:  ./LoaiSanPham/DanhSach.php');
    }
    // header('Location:  ./LoaiSanPham/DanhSach.php');
    include 'Views/LoaiSanPham/ThemMoi.php';
    }
    public function CapNhat(){
    include 'Views/LoaiSanPham/CapNhat.php';
    }
}