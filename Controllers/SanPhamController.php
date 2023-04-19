<?php
include_once("Models/SanPham.php");

class SanPhamController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new SanPham();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        //gọi method getuser
        $result  = $this->model->GetData();
        //gọi và show dữ liệu ra view
        include 'Views/SanPham/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            

            $file_name = $_FILES['hinhanh']['name'];
            $file_tmp = $_FILES['hinhanh']['tmp_name'];
          
            move_uploaded_file($file_tmp,"Assets/data/".$file_name);

            $create = $this->model->ThemMoi($_POST['idloaisanpham'], $_POST['tensanpham'], $_POST['gia']
            ,$_POST['mota'],$_POST['soluong'],$_POST['ngaysanxuat'],$file_name);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/SanPham/ThemMoi.php';
    }

    public function CapNhat(){

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatIdLoaiSanPham($id,$_POST['idloaisanpham']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatTenSanPham($id,$_POST['tensanpham']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatGia($id,$_POST['gia']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatMoTa($id,$_POST['mota']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatSoLuong($id,$_POST['soluong']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhatNgaySanXuat($id,$_POST['ngaysanxuat']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'sanpham';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
            $file_name = $_FILES['hinhanh']['name'];
            $file_tmp = $_FILES['hinhanh']['tmp_name'];
          
            move_uploaded_file($file_tmp,"Assets/HinhAnhSanPham/".$file_name);

            $update = $this->model->CapNhatHinhAnh($id,$_FILES['hinhanh']['name']);
            if ($update) {
                header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/SanPham/CapNhat.php';
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