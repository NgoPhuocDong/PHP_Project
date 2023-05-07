<?php
include_once("Models/LoaiTinTuc.php");

class LoaiTinTucController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new LoaiTinTuc();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 3;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['tentintuc'])) {
            $tentintuc = $_GET['tentintuc'];
            $tongsp = $this->model->TongLoaiTinTucTim($tentintuc);
            $totalPage = ceil($tongsp / $item);
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tentintuc);
            if($_GET['tentintuc']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongLoaiTinTuc();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach($item, $offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/LoaiTinTuc/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tentintuc']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/LoaiTinTuc/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'loaitintuc';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['tentintuc']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/LoaiTinTuc/CapNhat.php';
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