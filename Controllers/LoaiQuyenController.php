<?php
include_once("Models/LoaiQuyen.php");

class LoaiQuyenController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new LoaiQuyen();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 7;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['tenquyen'])) {
            $tenquyen = $_GET['tenquyen'];
            $tongsp = $this->model->TongLoaiQuyenTim($tenquyen);
            $totalPage = ceil($tongsp / $item);
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tenquyen);
            if($_GET['tenquyen']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongLoaiQuyen();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach($item,$offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/LoaiQuyen/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['tenquyen']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/LoaiQuyen/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'nhomquyen';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['tenquyen']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/LoaiQuyen/CapNhat.php';
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