<?php
include_once("Models/NhanVien.php");

class NhanVienController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new NhanVien();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        if(isset($_GET['tennhanvien'])) {
            $tennhanvien = $_GET['tennhanvien'];
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tennhanvien);
            if($_GET['tennhanvien']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach();
        }
        //gọi và show dữ liệu ra view
        include 'Views/NhanVien/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tennhanvien'], $_POST['gioitinh']
            ,$_POST['ngaysinh'],$_POST['sodienthoai'],$_POST['email'],$_POST['diachi']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/NhanVien/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'nhanvien';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat(
                $id,$_POST['tennhanvien'],
                $_POST['gioitinh'],
                $_POST['ngaysinh'],
                $_POST['sodienthoai'],
                $_POST['email'],
                $_POST['diachi']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            
        }
        include 'Views/NhanVien/CapNhat.php';
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