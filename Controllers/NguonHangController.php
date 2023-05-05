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
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($id);
            if($_GET['id']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            //gọi method DanhSach bên Models
            $result  = $this->model->GetDaTa();
        }
        //gọi và show dữ liệu ra view
        include 'Views/NguonHang/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tennguonhang'], $_POST['gioitinh']
            ,$_POST['ngaysinh'],$_POST['sodienthoai'],$_POST['email'],$_POST['diachi']);
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
                $update = $this->model->CapNhat($id,$_POST['tennguonhang'],
                                                    $_POST['gioitinh'],
                                                    $_POST['ngaysinh'],
                                                    $_POST['sodienthoai'],
                                                    $_POST['email'],
                                                    $_POST['diachi']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            // if (isset($_POST['submit'])) {
            //     $update = $this->model->CapNhatGioiTinh($id,$_POST['gioitinh']);
            //     if ($update) {
            //         header('Location: ./DanhSach');
            //     }
            // }
            // if (isset($_POST['submit'])) {
            //     $update = $this->model->CapNhatNgaySinh($id,$_POST['ngaysinh']);
            //     if ($update) {
            //         header('Location: ./DanhSach');
            //     }
            // }
            // if (isset($_POST['submit'])) {
            //     $update = $this->model->CapNhatSoDienThoai($id,$_POST['sodienthoai']);
            //     if ($update) {
            //         header('Location: ./DanhSach');
            //     }
            // }
            // if (isset($_POST['submit'])) {
            //     $update = $this->model->CapNhatEmail($id,$_POST['email']);
            //     if ($update) {
            //         header('Location: ./DanhSach');
            //     }
            // }
            // if (isset($_POST['submit'])) {
            //     $update = $this->model->CapNhatDiaChi($id,$_POST['diachi']);
            //     if ($update) {
            //         header('Location: ./DanhSach');
            //     }
            // }
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