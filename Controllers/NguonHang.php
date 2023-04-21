<?php
include_once("Models/NguonHang.php");

class NguonHangController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new NguonHang();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        //gọi method getuser
        $result  = $this->model->GetData();
        //gọi và show dữ liệu ra view
        include 'Views/NguonHang/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tennguonhang'], $_POST['sodienthoai']
            ,$_POST['email'],$_POST['diachi'],$_POST['ngaytao'],$_POST['nguoidaidien']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/NguonHang/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'nguonhang';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatTenNguonHang($id,$_POST['tennguonhang']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatSoDienThoai($id,$_POST['sodienthoai']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatEmail($id,$_POST['email']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatDiaChi($id,$_POST['diachi']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatNgayTao($id,$_POST['ngaytao']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatNguoiDaiDien($id,$_POST['nguoidaidien']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/NguonHang/CapNhat.php';
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