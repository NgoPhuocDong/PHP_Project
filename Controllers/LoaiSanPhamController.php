<?php
include_once("Models/LoaiSanPham.php");

class LoaiSanPhamController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new LoaiSanPham();
        $this->db = new Database();
    }
    public function DanhSach1(){
        include 'Views/LoaiSanPham/DanhSach.php';
    }
    public function DanhSach()
    {
        //gọi method getuser
        $result  = $this->model->GetData();
        //gọi và show dữ liệu ra view
        include 'Views/LoaiSanPham/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tenloaisanpham']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/LoaiSanPham/ThemMoi.php';
    }

    public function CapNhat($id){
        $table = 'loaisanpham(tenloaisanpham)';
        $result = $this->db->find($table,$id);
        if (isset($_POST['submit'])) {
            $update = $this->model->CapNhat($id, $_POST['tenloaisanpham']);
            if ($update) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/LoaiSanPham/CapNhat.php';
    }
}