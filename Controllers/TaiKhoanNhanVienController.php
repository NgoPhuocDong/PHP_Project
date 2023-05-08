<?php
include_once("Models/TaiKhoanNhanVien.php");
include_once("Models/NhanVien.php");
include_once("Models/Quyen.php");
include_once("Models/LoaiQuyen.php");
include_once("Models/PhanQuyen.php");

class TaiKhoanNhanVienController{
    private $model;
    private $db;
    private $tennhanvien;
    private $quyen;
    private $loaiquyen;
    private $phanquyen;
    
    public function __construct(){
        $this->model = new TaiKhoanNhanVien();
        $this->db = new Database();
        $this->tennhanvien = new NhanVien;
        $this->quyen = new Quyen;
        $this->loaiquyen = new LoaiQuyen;
        $this->phanquyen = new PhanQuyen();  
    }
    
    public function DanhSach()
    {   
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['tennhanvien'])) {
            $tennhanvien = $_GET['tennhanvien'];
            $totalPage = 0;
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tennhanvien);
            if($_GET['tennhanvien']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongTaiKhoan();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result = $this->model->DanhSach($item,$offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/TaiKhoanNhanVien/DanhSach.php';
        return $result;
    }

    

    public function ThemMoi(){
        $result = $this->tennhanvien->DanhSach(100,0);
        if (isset($_POST['submit'])) {
            $file_name = $_FILES['anhdaidien']['name'];
            $file_tmp = $_FILES['anhdaidien']['tmp_name'];
            move_uploaded_file($file_tmp,"Assets/AvatarNhanVien/".$file_name);
 
            $create = $this->model->ThemMoi($_POST['tendangnhap'],$_POST['idnhanvien'], $_POST['matkhau']
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
            $dataUpdate = $this->model->find($id);
            $result = $this->tennhanvien->find($id);
            if (isset($_POST['submit'])) {
                $file_name = $_FILES['anhdaidien']['name'];
                $file_tmp = $_FILES['anhdaidien']['tmp_name'];
                move_uploaded_file($file_tmp,"Assets/AvatarNhanVien/".$file_name);
                $update = $this->model->CapNhat(
                $id, $_POST['tendangnhap'],
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

    public function PhanQuyen() {
        $result = $this->loaiquyen->DanhSach($this->loaiquyen->TongLoaiQuyen(),0);
        $result1 = $this->quyen->DanhSachQuyen();
        include("Views/TaiKhoanNhanVien/PhanQuyen.php");
        return array($result,$result1);
    }

    public function LuuQuyen() {
        if (isset($_POST['Luuquyen'])) {
            $data = $_POST;
            $insertString = "";
            
            // Xóa quyển trước khi phân quyền cho tài khoản 
            $this->phanquyen->Xoa($data['user_id']);
            foreach($data['privilege'] as $privilege) {
                $insertString .= !empty($insertString) ? "," : "";
                $insertString .= "(NULL, ".$data['user_id'].", ".$privilege.")";
            }

            // Thêm quyền cho tài khoản 
            $insert = $this->phanquyen->Them($insertString);

            if(!$insert) {
                $_SESSION['error'] = "Cấp quyền cho tài khoản nhân viên không thành công.";
                unset($_SESSION['success']);
            } else {
                $_SESSION['success'] = "Cấp quyền cho tài khoản nhân viên thành công.";
                unset($_SESSION['error']);
            }
         
        }
        include("Views/TaiKhoanNhanVien/TrangThongBao.php");
    }  
}