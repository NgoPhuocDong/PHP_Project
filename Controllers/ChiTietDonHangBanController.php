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

    public function InDonHang() {
        $id = $_GET['id'];
        $result = $this->model->DanhSach1($id);
        $resultDonHang = $this->donhangban->ChiTiet($id);
        $resultKhachHang = $this->model->LayThongTinKhachHang($id);
        include("Views/ChiTietDonHangBan/In.php");
        // header("Location: ./chuyentrang");
        // $mail = new Mailer();
        // $mail->sendPDF('phucn1435@gmail.com');
        return array($result,$resultDonHang,$resultKhachHang);
    }

    public function ThemMoi(){
        $alert ="";
        $alert1 = " ";
        $result = $this->sanpham->DanhSach($this->sanpham->TongSanPham(),0);
        
        if (isset($_POST['submit'])) {
            $test = $this->model->LaySoLuong($_GET['id']) ;
            $test1 = $this->model->SoLuongSanPham($_POST['idsanpham']);
            $tong = 0;
            $thu = 0;
            if(empty($_POST['soluong'])){
                $alert="<span style='color: red; padding-bottom: 10px; display: block;'>Không được bỏ trống số lượng!</span>";
            } else if(!is_numeric($_POST['soluong'])){
                $alert = "<span style='color: red; padding-bottom: 10px; display: block;'>số lượng bắt buộc phải là số!</span>";
            } elseif (is_array($test)){
                for ($i = 0; $i < count($test); $i++) {
                    if ($test[$i]['idSanPham'] === $_POST['idsanpham']){
                        $tong = $test[$i]['SoLuong'] + $_POST['soluong'];
                        $thu =  $test[$i]['SoLuong'];
                    } else {
                        continue;
                    }
                }

                if ($tong > $test1[0]['SoLuong']) {
                    $alert1 = "Trong kho hàng chỉ có ".$test1[0]['SoLuong']." sản phẩm loại này. Mà anh zai đã thêm vào trong chi tiết đơn hàng là ".$thu." rồi. Anh zai mua thêm ".$_POST['soluong']." để *** à. Mua lại hoặc Cook.";
                } else {
                    $result1 = $this->model->test1($_GET['id']);
                    $index = -1;
                    foreach ($result1 as $key => $chi_tiet) {
                        if ($chi_tiet['idSanPham'] ==  $_POST['idsanpham']) {
                            $index = $key;
                            break;
                        }
                    }
                    if ($index != -1) {
                        // Sản phẩm đã tồn tại trong chi tiết đơn hàng
                        // Cập nhật số lượng sản phẩm
                        $result1[$index]['SoLuong'] += $_POST['soluong'];
                        $update = $this->model->CapNhatTest($_POST['iddonhangban'],$_POST['idsanpham'], $result1[$index]['SoLuong'], $_POST['dongiaapdung'],$_POST['thanhtien']);
                        $this->model->CapNhatTongTien($_GET['id']);
                        if($update){
                            header("Location: ./DanhSach&id=$_POST[iddonhangban]");
                        }
                    } else {
                        $create = $this->model->ThemMoi($_POST['iddonhangban'],$_POST['idsanpham'],  $_POST['soluong'], $_POST['dongiaapdung']);
                        if ($create) {
                        header("Location: ./DanhSach&id=$_POST[iddonhangban]");
                        }
                    }   
                }
            } else {
                if ($_POST['soluong'] > $test1[0]['SoLuong']) {
                    $alert1 = "Sản phẩm trong kho hàng chỉ có ".$test1[0]['SoLuong']." thôi à anh zai. Mua lại giúp. Còn không thì cook.";
                } else {
                    $create = $this->model->ThemMoi($_POST['iddonhangban'],$_POST['idsanpham'],  $_POST['soluong'], $_POST['dongiaapdung']);
                    if ($create) {
                        header("Location: ./DanhSach&id=$_POST[iddonhangban]");
                    }
                }
             
            }

            // $hihi = $this->model->
        }      
       
        // $result1 = $this->model->test1(1);
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
            $result11 = $this->model->test($id);
            // $a = $this->model->LaySoLuong($_GET['id']);
            $kk = $this->model->LaySoLuong1($_GET['id']);

            if(isset($_POST['button1'])) {
                for ($i = 0; $i < count($result11); $i++) {
                    // key => idSanPham ; value => Tongsoluong
                    if ($kk[$i]['SoLuong'] > $this->model->soLuongSanPham($kk[$i]['idSanPham'])[0]['SoLuong']) {
                        $_SESSION['non'] = "Ko";
                        $this->donhangban->CapNhatTrangThaiBanDauDonHang($id);
                    } else {
                        $arr = [
                            [$result11[$i]['idSanPham'] => $result11[$i]['total_quantity']],
                        ];
                        foreach ($arr as $subarray) {
                            foreach ($subarray as $key => $value) {
                                $this->model->hihi($key,$value);
                            } 
                        }
                        $this->donhangban->CapNhatTrangThaiHoanThanhDonHang($id);
                    }
                    // print_r($kk[1]['SoLuong']);
                    
                }
               
                unset($_SESSION['huydon']);
            }

            if(!isset($_SESSION['huydon'])) {
                $_SESSION['huydon'] = array();
            }
           
            if(isset($_POST['button2'])) {
                    $this->model->XoaHet($id);
                    $this->model->CapNhatTongTien1($id);
                    for ($i = 0; $i < count($result11); $i++) {
                        $arr = [
                            [$result11[$i]['idSanPham'] => $result11[$i]['total_quantity']],
                        ];
                        foreach ($arr as $subarray) {
                            foreach ($subarray as $key => $value) {
                                $this->model->hihi1($key,$value);
                            }
                        }
                    }
                   
                    $this->donhangban->CapNhatTrangThaiHuyDonHang($id);
                    $oderID = $id;
                    $_SESSION['huydon'][] = $oderID;
                    header("Location: ./DanhSach&id=".$_GET['id']);
                } 
            $result10 = $this->donhangban->idtrangthai($id);  
        }
        include 'Views/ChiTietDonHangBan/DanhSach.php';
        return array($result, $resultDonHang,$result10,$result11);
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
