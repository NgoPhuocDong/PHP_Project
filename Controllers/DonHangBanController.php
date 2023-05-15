<?php
include_once("Models/DonHangBan.php");

include_once("Models/SanPham.php");
include_once("Models/ChiTietDonHangBan.php");
include_once("Models/KhachHang.php");
include_once("Models/NhanVien.php");
class DonHangBanController{
    private $model;
    private $db;
    private $sanpham;
    private $chitietdonhangban;
    private $khachhang;
    private $nhanvienlap;
    public function __construct(){
        $this->model = new DonHangBan();
        $this->db = new Database();
        $this->sanpham = new SanPham();
        $this->chitietdonhangban = new ChiTietDonHangBan();
        $this->khachhang = new KhachHang();
        $this->nhanvienlap = new NhanVien();
    }
    
    
    public function DanhSach()
    {
        // $ten2 = $this->model->tentrangthai(5);
        // $ten3 = $this->model->tentrangthai(3);
        // $ten1 = $this->model->tentrangthai(1);
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current = !empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
       
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $totalPage = 0;
            // $totalPage = ceil($tongsp / $item);

            //gọi method GetDataID mở Models DonHangBan.php
            $result = $this->model->ChiTiet($id);
            if($_GET['id']==null){
                header('Location: ./DanhSach');
            }
        } else {
            // $this->model->DanhSachID();
            $tongsp = $this->model->TongDonHangBan();
            if($tongsp > 0) {
                $_SESSION['tongdonhangban'] = $tongsp;
            } else {
                unset($_SESSION['tongdonhangban']);
            }
           
            $totalPage = ceil($tongsp / $item);
            $result = $this->model->DanhSach($item,$offset);
            //gọi method GetData mở Models DonHangBan.php
        }

       
        
        //gọi và show dữ liệu ra view
        include 'Views/DonHangBan/DanhSach.php';
        return array($result);
    }

    public function ThemMoi(){
        $ListKhachHang = $this->khachhang->GetData(100,0);
        $ListNhanVien = $this->nhanvienlap->DanhSach(100,0);
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['idnhanvienlap'], $_POST['idkhachhang'], 5,$_POST['ngaylap'],$_POST['tongtien']);
        $alert = "";
        $ListNhanVien = $this->nhanvienlap->DanhSach(100,0);
        $ListKhachHang = $this->khachhang->GetData(100,0);
        if (isset($_POST['submit'])) {
            if(empty($_POST['idkhachhang']) || empty($_POST['idnhanvienlap'])){
                $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống id nhân viên lập và khách hàng!</span>";
            }else if(!is_numeric($_POST['idkhachhang']) || !is_numeric($_POST['idnhanvienlap'])){
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>id nhân viên và khách hàng bắt buộc phải là số!</span>";
            }else{
                $create = $this->model->ThemMoi($_POST['idnhanvienlap'], $_POST['idkhachhang'],  $_POST['idtrangthai'],$_POST['ngaylap'],$_POST['tongtien']);
            if ($create) {
                // $this->sanpham->DS();
                header('Location: ./DanhSach');
            }
            }
        }}
        include 'Views/DonHangBan/ThemMoi.php';
        return Array($ListKhachHang,$ListNhanVien);
    }

    public function CapNhat(){
        $ListKhachHang = $this->khachhang->GetData(100,0);
        $ListNhanVien = $this->nhanvienlap->DanhSach(100,0);
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

        return Array($dataUpdate,$ListKhachHang,$ListNhanVien);
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