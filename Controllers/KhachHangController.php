<?php
include_once("Models/KhachHang.php");

class KhachHangController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new KhachHang();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            //gọi method TimKiem bên Models
            $totalPage = 0;
            $result  = $this->model->TimKiem($id);
            if($_GET['id']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongKhachHang();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result  = $this->model->GetData($item,$offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/KhachHang/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tenkhachhang'], $_POST['gioitinh']
            ,$_POST['ngaysinh'],$_POST['sodienthoai'],$_POST['email'],$_POST['diachi']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/KhachHang/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'khachhang';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['tenkhachhang'],
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
        include 'Views/KhachHang/CapNhat.php';
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