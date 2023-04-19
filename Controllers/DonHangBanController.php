<?php
include_once("Models/DonHangBan.php");

class DonHangBanController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new DonHangBan();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //gọi method GetDataID mở Models DonHangBan.php
            $result  = $this->model->GetDataID($id);
        }
        else{
            //gọi method GetData mở Models DonHangBan.php
            $result  = $this->model->GetData();
        }
        //gọi và show dữ liệu ra view
        include 'Views/DonHangBan/DanhSach.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['idnhanvienlap'], $_POST['idkhachhang'],  $_POST['idtrangthai'],$_POST['ngaylap'],$_POST['tongtien']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        include 'Views/DonHangBan/ThemMoi.php';
    }

    public function CapNhat(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangban';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['idnhanvienlap'],
                                                    $_POST['idkhachhang'],
                                                    $_POST['idtrangthai'],
                                                    $_POST['ngaylap'],
                                                    $_POST['tongtien']);
                if ($update) {
                    header('Location: ./DanhSach');
                }
            }
        }
        include 'Views/DonHangBan/CapNhat.php';
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