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
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $tongsp = $this->model->TongNguonHangTim($id);
            $totalPage = ceil($tongsp / $item);
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($id);
            if($_GET['id']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongNguonHang();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result  = $this->model->GetDaTa($item,$offset);
        }
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
                $update = $this->model->CapNhat($id,$_POST['tennguonhang'],
                                                    $_POST['sodienthoai'],
                                                    $_POST['email'],
                                                    $_POST['diachi'],
                                                    $_POST['ngaytao'],
                                                    $_POST['nguoidaidien']);
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