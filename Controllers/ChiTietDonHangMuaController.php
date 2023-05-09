<?php
include_once("Models/ChiTietDonHangMua.php");
include_once("Models/DonHangMua.php");
include_once("Models/SanPham.php");
class ChiTietDonHangMuaController{
    private $model;
    private $donhangmua;
    private $sanpham;
    private $db;
    
    public function __construct(){
        $this->model = new ChiTietDonHangMua();
        $this->db = new Database();
        $this->donhangmua = new DonHangMua();
        $this->sanpham = new SanPham();
    }

    public function ThemMoi(){
        $result = $this->sanpham->DanhSach($this->sanpham->TongSanPham(),0);
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['iddonhangmua'],
                                            $_POST['idsanpham'],
                                            $_POST['soluong'],
                                            $_POST['dongiaapdung']);
            if ($create) {
                header("Location: ./DanhSach&id=$_POST[iddonhangmua]");
            }
        }
        include 'Views/ChiTietDonHangMua/ThemMoi.php';
        return array($result);
    }

    public function DanhSach(){
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current = !empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        $tongsp = $this->model->TongChiTietDHM();
        $totalPage = ceil($tongsp / $item);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $table = 'donhangmua';
            //lấy dữ liệu từ ChiTietDonHangMua
            $result = $this->model->DanhSach($id,$item,$offset);
            $resultDonHang = $this->donhangmua->ChiTiet($id);
            //Truy vấn dữ liệu từ DonHangMua
            //$resultDonHang = $this->db->find($table,$id);
        }
        include 'Views/ChiTietDonHangMua/DanhSach.php';
        return array($result, $resultDonHang);
    }
    public function CapNhat(){
        $listProduct = $this->sanpham->DanhSach($this->sanpham->TongSanPham(),0);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->model->find($id);
            if (isset($_POST['submit'])) {
                $update = $this->model->CapNhat($id,$_POST['iddonhangmua'],
                                                    $_POST['idsanpham'],
                                                    $_POST['soluong'],
                                                    $_POST['dongiaapdung']);
                                                    // $_POST['thanhtien']);
                if ($update) {
                    header("Location: ./DanhSach&id=$_POST[iddonhangmua]");
                }
            }
        }
        include 'Views/ChiTietDonHangMua/CapNhat.php';
        return array($dataUpdate,$listProduct);
    }
    public function Xoa(){
        if (isset($_GET['act'])){
            $iddonhangmua = $_GET['id'];
            $id = $_GET['act'];
            $delete = $this->model->Xoa($id,$iddonhangmua);
            if ($delete) {
                return $this->DanhSach();
            }
        }
        include 'Views/ChiTietDonHangMua/DanhSach.php';
    }
}
