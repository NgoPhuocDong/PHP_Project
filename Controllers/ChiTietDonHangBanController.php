<?php
include_once("Models/ChiTietDonHangBan.php");
include_once("Models/DonHangBan.php");
class ChiTietDonHangBanController{
    private $model;
    private $donhangban;
    private $db;
    
    public function __construct(){
        $this->model = new ChiTietDonHangBan();
        $this->db = new Database();
        $this->donhangban = new DonHangBan();
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['iddonhangban'],$_POST['idsanpham'],  $_POST['soluong'],$_POST['dongiaapdung'],$_POST['thanhtien']);
            if ($create) {
                header("Location: ./DanhSach&id=$_POST[iddonhangban]");
            }
        }
        include 'Views/ChiTietDonHangBan/ThemMoi.php';
    }

    public function DanhSach(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangban';
            //lấy dữ liệu từ ChiTietDonHangBan
            $result = $this->model->GetDaTa($id);
            $resultDonHang = $this->donhangban->GetDaTaID($id);
            //Truy vấn dữ liệu từ DonHangBan
            //$resultDonHang = $this->db->find($table,$id);
        }
        include 'Views/ChiTietDonHangBan/DanhSach.php';
        return $result and $resultDonHang;
    }

    // public function CapNhat(){
    //     if (isset($_GET['id'])) {
    //         $id = $_GET['id'];
    //         $table = 'chitietdonhangban';
    //         //lấy dữ liệu cần cập nhật
    //         $dataUpdate = $this->db->find($table,$id);
            
    //         if (isset($_POST['submit'])) {
    //             $update = $this->model->CapNhat($id,$_POST['iddonhangban'],
    //                                                 $_POST['idsanpham'],
    //                                                 $_POST['soluong'],
    //                                                 $_POST['dongiaapdung'],
    //                                                 $_POST['thanhtien']);
    //             if ($update) {
    //                 header('Location: ./DanhSach');
    //             }
    //         }
    //         if (isset($_POST['submit'])) {
    //             $update = $this->model->CapNhatIdSanPham($id,$_POST['idsanpham']);
    //             if ($update) {
    //                 header('Location: ./DanhSach');
    //             }
    //         }
    //         if (isset($_POST['submit'])) {
    //             $update = $this->model->CapNhatSoLuong($id,$_POST['soluong']);
    //             if ($update) {
    //                 header('Location: ./DanhSach');
    //             }
    //         }
    //         if (isset($_POST['submit'])) {
    //             $update = $this->model->CapNhatDonGiaApDung($id,$_POST['dongiaapdung']);
    //             if ($update) {
    //                 header('Location: ./DanhSach');
    //             }
    //         }
    //         if (isset($_POST['submit'])) {
    //             $update = $this->model->CapNhatThanhTien($id,$_POST['thanhtien']);
    //             if ($update) {
    //                 header('Location: ./DanhSach');
    //             }
    //         }
    //     }
    //     include 'Views/ChiTietDonHangBan/CapNhat.php';
    //     return $dataUpdate;
    // }
    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'chitietdonhangban';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
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
        return $dataUpdate;
    }

    public function Xoa(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $this->model->Xoa($id);
            if ($delete) {
                header('Location: ./DanhSach');
            }
        }
    }
}