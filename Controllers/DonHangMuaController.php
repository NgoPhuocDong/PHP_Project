<?php
include_once("Models/DonHangMua.php");

class DonHangMuaController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new DonHangMua();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $totalPage = 0;
            //gọi method GetDataID mở Models DonHangMua.php
            $result = $this->model->ChiTiet($id);
            if($_GET['id']==null){
                header('Location: ./DanhSach'); 
            }
        }
        else{
            $tongsp = $this->model->TongDonHangMua();
            $totalPage = ceil($tongsp / $item);
            //gọi method GetData mở Models DonHangMua.php
            $result  = $this->model->DanhSach($item,$offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/DonHangMua/DanhSach.php';
        return $result;
    }
    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['idnhanvienlap'], $_POST['idnguonhang'],  $_POST['idtrangthai'],$_POST['ngaylap'],$_POST['tongtien']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/DonHangMua/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangmua';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['idnhanvienlap'],
                                                    $_POST['idnguonhang'],
                                                    $_POST['idtrangthai'],
                                                    $_POST['ngaylap'],
                                                    $_POST['tongtien']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/DonHangMua/CapNhat.php';
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