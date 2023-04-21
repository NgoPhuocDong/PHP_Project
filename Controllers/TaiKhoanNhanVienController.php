<?php
include_once("Models/TaiKhoanNhanVien.php");
include_once("Models/NhanVien.php");

class TaiKhoanNhanVienController{
    private $model;
    private $db;
    private $tennhanvien;
    
    public function __construct(){
        $this->model = new TaiKhoanNhanVien();
        $this->db = new Database();
        $this->tennhanvien = new NhanVien;
    }
    
    public function DanhSach()
    {
        if(isset($_GET['tendangnhap'])) {
            $tendangnhap = $_GET['tendangnhap'];
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tendangnhap);
            if($_GET['tendangnhap']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach();
        }
        //gọi và show dữ liệu ra view
        include 'Views/TaiKhoanNhanVien/DanhSach.php';
        return $result;
    }

    

    public function ThemMoi(){
        $result = $this->tennhanvien->DanhSach();
        if (isset($_POST['submit'])) {
            $file_name = $_FILES['anhdaidien']['name'];
            $file_tmp = $_FILES['anhdaidien']['tmp_name'];
            move_uploaded_file($file_tmp,"Assets/AvatarNhanVien/".$file_name);

            $create = $this->model->ThemMoi($_POST['idnhanvien'],$_POST['tendangnhap'], $_POST['matkhau']
            ,$_POST['trangthai'],$file_name);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/TaiKhoanNhanVien/ThemMoi.php';
        return $result;
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $table = 'taikhoannhanvien';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            $result = $this->tennhanvien->DanhSach();
            if (isset($_POST['submit'])) {
                $file_name = $_FILES['anhdaidien']['name'];
                $file_tmp = $_FILES['anhdaidien']['tmp_name'];
                move_uploaded_file($file_tmp,"Assets/AvatarNhanVien/".$file_name);
                $update = $this->model->CapNhat(
                $id,$_POST['idnhanvien'],
                $_POST['tendangnhap'],
                $_POST['matkhau'],
                $_POST['trangthai'],
                $file_name);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
            
        }
        include 'Views/TaiKhoanNhanVien/CapNhat.php';
        return array($result,$dataUpdate);
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