<?php
include_once("Models/ChiTietHoaDonMua.php");

class ChiTietHoaDonMuaController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new ChiTietDonHangMua();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        //gọi method getuser
        $result  = $this->model->GetData();
        //gọi và show dữ liệu ra view
        include 'Views/ChiTietDonHangMua/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['iddonhangmua'], $_POST['idsanpham'],  $_POST['soluong'],$_POST['dongiaapdung'],$_POST['thanhtien']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/ChiTietDonHangMua/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'chitietdonhangmua';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatIdDonHangMua($id,$_POST['iddonhangmua']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatIdSanPham($id,$_POST['idsanpham']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatSoLuong($id,$_POST['soluong']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatDonGiaApDung($id,$_POST['dongiaapdung']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatThanhTien($id,$_POST['thanhtien']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/ChiTietDonHangMua/CapNhat.php';
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