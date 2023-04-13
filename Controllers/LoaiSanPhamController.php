<?php
include_once("Models/LoaiSanPham.php");

class LoaiSanPhamController{
    private $model;
    public function __construct(){
        $this->model = new LoaiSanPham();
    }
    public function DanhSach(){
        include 'Views/LoaiSanPham/DanhSach.php';
    }   
    // public function ThemMoi(){
    // if(isset($_POST['submit'])){
    //     $tenloaisanpham = $_POST['tenloaisanpham'];
    //     $this->db->insert($tenloaisanpham);
       
    //     header('Location:  ./LoaiSanPham/DanhSach.php');
    // }
    // // header('Location:  ./LoaiSanPham/DanhSach.php');
    // include 'Views/LoaiSanPham/ThemMoi.php';
    // }
    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $result = $this->model->ThemMoi($_POST['tenloaisanpham']);
            if ($result) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/LoaiSanPham/ThemMoi.php';
    }

    public function CapNhat(){
        include 'Views/LoaiSanPham/CapNhat.php';
    }
}