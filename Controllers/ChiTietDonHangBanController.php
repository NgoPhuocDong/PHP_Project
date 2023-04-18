<?php
include_once("Models/ChiTietDonHangBan.php");

class ChiTietDonHangBanController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new ChiTietDonHangBan();
        $this->db = new Database();
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['iddonhangban'],$_POST['idsanpham'],  $_POST['soluong'],$_POST['dongiaapdung'],$_POST['thanhtien']);
            if ($create) {
                header("Location: ./ChiTiet&id=$_POST[iddonhangban]");
            }
        }
        include 'Views/ChiTietDonHangBan/ThemMoi.php';
    }

    public function ChiTiet(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangban';
            //lấy dữ liệu từ ChiTietDonHangBan
            $result = $this->model->GetDaTa($id);
            //Truy vấn dữ liệu từ DonHangBan
            $resultDonHang = $this->db->find($table,$id);
        }
        include 'Views/ChiTietDonHangBan/ChiTiet.php';
        return $result and $resultDonHang;
    }
    // public function DanhSach()
    // {
    //     //gọi method getuser
    //     $result  = $this->model->GetData();
    //     //gọi và show dữ liệu ra view
    //     include 'Views/ChiTietDonHangBan/ChiTiet.php';
    //     return $result;
    // }

    // public function CapNhat($id){
    //     $table = 'loaisanpham(tenloaisanpham)';
    //     $result = $this->db->find($table,$id);
    //     if (isset($_POST['submit'])) {
    //         $update = $this->model->CapNhat($id, $_POST['tenloaisanpham']);
    //         if ($update) {
    //             header('Location: ./DanhSach');
    //         }
    //     }
    //     include 'Views/LoaiSanPham/CapNhat.php';
    // }
}