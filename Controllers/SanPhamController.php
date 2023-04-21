<?php
include_once("Models/SanPham.php");
include_once("Models/LoaiSanPham.php");//

class SanPhamController{
    private $model;
    private $loaisanpham;
    private $db;
    
    public function __construct(){
        $this->model = new SanPham();
        $this->loaisanpham = new LoaiSanPham();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        if(isset($_GET['tensanpham'])) {
            $tensanpham = $_GET['tensanpham'];
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tensanpham);
            if($_GET['tensanpham']==null){
                header('Location: ./DanhSach');
            }
        }
        
        else{
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach();
        }
    
        //gọi và show dữ liệu ra view
        include 'Views/SanPham/DanhSach.php';
        return $result;
    
    }
    public function ThemMoi(){
        $result = $this->loaisanpham->DanhSach();
        if (isset($_POST['submit'])) {

            $file_name = $_FILES['hinhanh']['name'];
            $file_tmp = $_FILES['hinhanh']['tmp_name'];
          
            move_uploaded_file($file_tmp,"Assets/data/".$file_name);

            $create = $this->model->ThemMoi($_POST['idloaisanpham'],
                                            $_POST['tensanpham'],
                                            $_POST['gia'],
                                            $_POST['mota'],
                                            $_POST['soluong'],
                                            $_POST['ngaysanxuat'],$file_name);
            if ($create) {
                header('Location: ./DanhSach');
            }
            
        }
        require_once('Views/SanPham/ThemMoi.php');
        return $result;
       
    }

    public function CapNhat(){
        $result  = $this->loaisanpham->DanhSach();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->model->find($id);
            if (isset($_POST['submit'])) {
                $file_name = $_FILES['hinhanh']['name'];
                $file_tmp = $_FILES['hinhanh']['tmp_name'];
                move_uploaded_file($file_tmp,"Assets/data/".$file_name);
                $update = $this->model->CapNhat($id,$_POST['idloaisanpham'],
                                                    $_POST['tensanpham'],
                                                    $_POST['gia'],
                                                    $_POST['mota'],
                                                    $_POST['soluong'],
                                                    $_POST['ngaysanxuat'],
                                                    $_FILES['hinhanh']['name']);

                if ($update) {
                    header('Location: ./DanhSach');
                }
            }            
        }
        include 'Views/SanPham/CapNhat.php';
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

    // public function TimKiem(){
    //    // Lấy từ khóa tìm kiếm từ người dùng
    // $search = isset($_GET['search']) ? $_GET['search'] : '';

    // // Gọi model để lấy dữ liệu sản phẩm
    // $products = ProductModel::searchProducts($search);

    // // Gọi view để hiển thị dữ liệu sản phẩm lên màn hình
    // include 'views/search.php';
    // }



