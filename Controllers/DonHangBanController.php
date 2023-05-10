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
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current = !empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $totalPage = 0;
            // $totalPage = ceil($tongsp / $item);

            //gọi method GetDataID mở Models DonHangBan.php
            $result  = $this->model->ChiTiet($id);
            if($_GET['id']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongDonHangBan();
            $totalPage = ceil($tongsp / $item);
            //gọi method GetData mở Models DonHangBan.php
            $result  = $this->model->DanhSach($item,$offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/DonHangBan/DanhSach.php';
        return $result;
    }
    

    public function ThemMoi(){
        $alert = "";
        if (isset($_POST['submit'])) {
            if(empty($_POST['idkhachhang']) || empty($_POST['idnhanvienlap'])){
                $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống id nhân viên lập và khách hàng!</span>";
            }else if(!is_numeric($_POST['idkhachhang']) || !is_numeric($_POST['idnhanvienlap'])){
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>id nhân viên và khách hàng không phải là số!</span>";
            }else{
                $create = $this->model->ThemMoi($_POST['idnhanvienlap'], $_POST['idkhachhang'],  $_POST['idtrangthai'],$_POST['ngaylap'],$_POST['tongtien']);
            if ($create) {
                header('Location: ./DanhSach');
            }
            }
        }
        include 'Views/DonHangBan/ThemMoi.php';
    }

    public function CapNhat(){
        $alert = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangban';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            
            if (isset($_POST['submit'])) {
                if(empty($_POST['idkhachhang']) || empty($_POST['idnhanvienlap'])){
                    $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống id nhân viên lập và khách hàng!</span>";
                }else if(!is_numeric($_POST['idkhachhang']) || !is_numeric($_POST['idnhanvienlap'])){
                    $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>id nhân viên và khách hàng không phải là số!</span>";
                }else{
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