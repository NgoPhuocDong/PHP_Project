<?php
include_once("Models/SanPham.php");
include_once("Models/DonHangBan.php");
include_once("Models/DonHangMua.php");
include_once("Models/loginKhachHang.php");
class ThongKeController{
    private $sanpham;
    private $donhangban;
    private $db;
    private $donhangmua;
    private $login;

    public function __construct(){
        $this->sanpham = new SanPham();
        $this->donhangban = new DonHangBan();
        $this->db = new Database();
        $this->donhangmua = new DonHangMua();
        $this->login = new loginKhachHang();
    }
    
    public function ChiTiet(){
        $tongsanpham= $this->sanpham->TongSanPham();
        $tongdonhangban = $this->donhangban->TongDonHangBan();
        $tongtiendonhangban = $this->donhangban->DoanhThuDonHangBan();

        $thongkedonhangban = $this->donhangban->ThongKeDonHangBan();

        $hangtheongay = $this->donhangban->DonHangTheoNgay();
        $tongdonhangbanhuy = $this->donhangban->TongDonHangBanHuy();
        $tongdonhangbantc = $this->donhangban->TongDonHangBanThanhCong();

        $tongtiendonhangmua = $this->donhangmua->DoanhThuDonHangMua();

        // Thống kê truy cập
        // $thongketruycap = $this->login->koko();
        $thongketruycap1 = $this->login->TongTruyCap();
        // $thongketruycap2 = $this->login->koko2();
        // $thongketruycap3 = $this->login->koko3(2023);
        $thongketruycaptheonam = $this->login->TongTruyCapCacNam();


        include 'Views/ThongKe/chitiet.php';
        return array($tongsanpham,$tongdonhangban,$tongtiendonhangban,$thongkedonhangban,$tongtiendonhangmua,$thongketruycap1,
        $tongdonhangbanhuy,$tongdonhangbantc,$hangtheongay,$thongketruycaptheonam);
    }

    // Thống kê truy cập
    public function ajax(){
        // $thongketruycap = $this->login->koko();
        // $thongketruycap1 = $this->login->koko1();
        // $thongketruycap2 = $this->login->koko2();
        $thongketruycap1 = $this->login->TongTruyCap(); 

        include("Views/ThongKe/get_chart_data.php");
        return array($thongketruycap1);
    }

    public function LuotTruyCapTheoNgay() {
        include("Views/ThongKe/LuotTruyCapTheoNgay.php");
    }
}