<?php
include_once("Models/LoaiSanPham.php");

class LoaiSanPhamController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new LoaiSanPham();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['tenloaisanpham'])) {
            $tenloaisanpham = $_GET['tenloaisanpham'];
            $tongsp = $this->model->TongLoaiSanPhamTim($tenloaisanpham);
            $totalPage = ceil($tongsp / $item);
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tenloaisanpham);
            if($_GET['tenloaisanpham']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongLoaiSanPham();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach($item,$offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/LoaiSanPham/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tenloaisanpham']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/LoaiSanPham/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'loaisanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['tenloaisanpham']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/LoaiSanPham/CapNhat.php';
        return $dataUpdate;
    }
    //hàm xóa
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