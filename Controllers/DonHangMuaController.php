<?php
include_once("Models/DonHangMua.php");
include_once("Models/NguonHang.php");
include_once("Models/NhanVien.php");

class DonHangMuaController{
    private $model;
    private $db;
    private $nguonhang;
    private $nhanvienlap;
    
    
    public function __construct(){
        $this->model = new DonHangMua();
        $this->db = new Database();
        $this->nguonhang = new NguonHang();
        $this->nhanvienlap = new NhanVien();
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
        $alert = "";
        $ListNguonHang = $this->nguonhang->GetData(100,0);
        $ListNhanVien = $this->nhanvienlap->DanhSach(100,0);
        if (isset($_POST['submit'])) {
            if(empty($_POST['idnguonhang']) || empty($_POST['idnhanvienlap'])){
                $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống id nhân viên lập và nguồn hàng!</span>";
            }else if(!is_numeric($_POST['idnguonhang']) || !is_numeric($_POST['idnhanvienlap'])){
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>id nhân viên và nguồn hàng bắt buộc phải là số!</span>";
            }else{
            $create = $this->model->ThemMoi($_POST['idnhanvienlap'], $_POST['idnguonhang'],  $_POST['idtrangthai'],$_POST['ngaylap'],$_POST['tongtien']);
            if ($create) {
                header('Location: ./DanhSach');
            }
        }
        }
        include 'Views/DonHangMua/ThemMoi.php';
        return Array($ListNguonHang,$ListNhanVien);
    }

    public function CapNhat(){
        $alert = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangmua';
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->db->find($table,$id);
            $ListNguonHang = $this->nguonhang->GetData(100,0);
            $ListNhanVien = $this->nhanvienlap->DanhSach(100,0);
            if (isset($_POST['submit'])) {
                if(empty($_POST['idnguonhang']) || empty($_POST['idnhanvienlap'])){
                    $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống id nhân viên lập và nguồn hàng!</span>";
                }else if(!is_numeric($_POST['idnguonhang']) || !is_numeric($_POST['idnhanvienlap'])){
                    $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>id nhân viên và nguồn hàng bắt buộc phải là số!</span>";
                }else{
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
        }
        include 'Views/DonHangMua/CapNhat.php';
        return Array($dataUpdate,$ListNguonHang,$ListNhanVien);
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