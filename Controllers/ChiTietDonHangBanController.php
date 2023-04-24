<?php
include_once("Models/ChiTietDonHangBan.php");
include_once("Models/DonHangBan.php");
include_once("Models/SanPham.php");
class ChiTietDonHangBanController{
    private $model;
    private $donhangban;
    private $sanpham;
    private $db;
    
    public function __construct(){
        $this->model = new ChiTietDonHangBan();
        $this->db = new Database();
        $this->donhangban = new DonHangBan();
        $this->sanpham = new SanPham();
    }

    public function ThemMoi(){
        $result = $this->sanpham->DanhSach();
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['iddonhangban'],$_POST['idsanpham'],  $_POST['soluong'],$_POST['dongiaapdung']);
            if ($create) {
                header("Location: ./DanhSach&id=$_POST[iddonhangban]");
            }
        }
        include 'Views/ChiTietDonHangBan/ThemMoi.php';
        return array($result);
    }

    public function DanhSach(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangban';
            //lấy dữ liệu từ ChiTietDonHangBan
            $result = $this->model->DanhSach($id);
            $resultDonHang = $this->donhangban->ChiTiet($id);
            //Truy vấn dữ liệu từ DonHangBan
            //$resultDonHang = $this->db->find($table,$id);
        }
        include 'Views/ChiTietDonHangBan/DanhSach.php';
        return array($result, $resultDonHang);
    }
    public function CapNhat(){
        $listProduct = $this->sanpham->DanhSach();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->model->find($id);
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['iddonhangban'],
                                                    $_POST['idsanpham'],
                                                    $_POST['soluong'],
                                                    $_POST['dongiaapdung'],
                                                    $_POST['thanhtien']);
                if ($update) {
                    header("Location: ./DanhSach&id=$_POST[iddonhangban]");
                }
            }
        }
        include 'Views/ChiTietDonHangBan/CapNhat.php';
        return array($dataUpdate,$listProduct);
    }
    public function Xoa(){
        if (isset($_GET['act'])){
            $id = $_GET['act'];
            $delete = $this->model->Xoa($id);
            if ($delete) {
                return $this->DanhSach();
            }
        }
        include 'Views/ChiTietDonHangBan/DanhSach.php';
    }
    public function DonGiaApDung(){
        $m = "sakfkks";
    }
}