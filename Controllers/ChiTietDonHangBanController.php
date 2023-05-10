<?php
include_once("Models/ChiTietDonHangBan.php");
include_once("Models/DonHangBan.php");
include_once("Models/SanPham.php");
class ChiTietDonHangBanController{
    private $model;
    private $donhangban;
    private $sanpham;
    private $db;
    
    public function __construct(){
        $this->model = new ChiTietDonHangBan();
        $this->db = new Database();
        $this->donhangban = new DonHangBan();
        $this->sanpham = new SanPham();
    }

    public function ThemMoi(){
        $alert ="";
        $result = $this->sanpham->DanhSach($this->sanpham->TongSanPham(),0);
        if (isset($_POST['submit'])) {
            if(empty($_POST['soluong'])){
                $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống số lượng!</span>";
            }else if(!is_numeric($_POST['soluong'])){
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>số lượng bắt buộc phải là số!</span>";
            } else{
                $create = $this->model->ThemMoi($_POST['iddonhangban'],$_POST['idsanpham'],  $_POST['soluong'],$_POST['dongiaapdung']);
                if ($create) {
                    header("Location: ./DanhSach&id=$_POST[iddonhangban]");
                }
            }
        }
        include 'Views/ChiTietDonHangBan/ThemMoi.php';
        return array($result);
    }

    public function DanhSach(){
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current = !empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        $tongsp = $this->model->TongChiTietDHB();
        $totalPage = ceil($tongsp / $item);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangban';
            //lấy dữ liệu từ ChiTietDonHangBan
            $result = $this->model->DanhSach($id,$item,$offset);
            $resultDonHang = $this->donhangban->ChiTiet($id);
            //Truy vấn dữ liệu từ DonHangBan
            //$resultDonHang = $this->db->find($table,$id);
        }
        include 'Views/ChiTietDonHangBan/DanhSach.php';
        return array($result, $resultDonHang);
    }
    public function CapNhat(){
        $alert = "";
        $listProduct = $this->sanpham->DanhSach($this->sanpham->TongSanPham(),0);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->model->find($id);
            if (isset($_POST['submit'])) {
                if(empty($_POST['soluong'])){
                    $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống số lượng!</span>";
                }else if(!is_numeric($_POST['soluong'])){
                    $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>số lượng bắt buộc phải là số!</span>";
                } else{
                    $update = $this->model->CapNhat($id,$_POST['iddonhangban'],
                                                        $_POST['idsanpham'],
                                                        $_POST['soluong'],
                                                        $_POST['dongiaapdung'],
                                                        $_POST['thanhtien']);
                    if ($update) {
                        header("Location: ./DanhSach&id=$_POST[iddonhangban]");
                    }
                }
            }
        }
        include 'Views/ChiTietDonHangBan/CapNhat.php';
        return array($dataUpdate,$listProduct);
    }
    public function Xoa(){
        if (isset($_GET['act'])){
            $iddonhangban = $_GET['id'];
            $id = $_GET['act'];
            $delete = $this->model->Xoa($id,$iddonhangban);
            if ($delete) {
                return $this->DanhSach();
            }
        }
        include 'Views/ChiTietDonHangBan/DanhSach.php';
    }
}