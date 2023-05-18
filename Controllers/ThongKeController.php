<?php

include_once("Models/SanPham.php");
include_once("Models/DonHangBan.php");
include_once("Models/DonHangMua.php");
include_once("Models/loginKhachHang.php");

class ThongKeController{
    private $sanpham;
    private $donhangban;
    private $donhangmua;
    private $login;
    private $db;

    public function __construct(){
        $this->sanpham = new SanPham();
        $this->donhangban = new DonHangBan();
        $this->donhangmua = new DonHangMua();
        $this->login = new loginKhachHang();
        $this->db = new Database();
    }
    
    public function ChiTiet(){
       //  Thống kê doanh thu
       $tongsanpham= $this->sanpham->TongSanPham();
       $tongdonhangban = $this->donhangban->TongDonHangBan();
       $tongtiendonhangban = $this->donhangban->DoanhThuDonHangBan();
       $tongtiendonhangmua = $this->donhangmua->DoanhThuDonHangMua();

       // Thống kê đơn hàng bán
       $thongkedonhangban = $this->donhangban->ThongKeDonHangBan();
       $hangtheongay = $this->donhangban->DonHangTheoNgay();
       $tongdonhangbanhuy = $this->donhangban->TongDonHangBanHuy();
       $tongdonhangbantc = $this->donhangban->TongDonHangBanThanhCong();
       $tongdonhangbanhuytheonam = $this->donhangban->TongDonHangBanHuyCacNam();
       $tongdonhangbantctheonam = $this->donhangban->TongDonHangBanThanhCongCacNam();


       // Thống kê truy cập
       $thongketruycap1 = $this->login->TongTruyCap();
       $thongketruycaptheonam = $this->login->TongTruyCapCacNam();


       include 'Views/ThongKe/chitiet.php';
       return array($tongsanpham,$tongdonhangban,$tongtiendonhangban,$thongkedonhangban,$tongtiendonhangmua,$thongketruycap1,
       $tongdonhangbanhuy,$tongdonhangbantc,$hangtheongay,$thongketruycaptheonam,$tongdonhangbanhuytheonam,$tongdonhangbantctheonam);
    }

     // Thống kê truy cập
     public function ajax(){
        $thongketruycap1 = $this->login->TongTruyCap(); 

        include("Views/ThongKe/get_chart_data.php");
        return array($thongketruycap1);
    }

    public function ajax1(){
        include("Views/ThongKe/get_chart_data1.php");
    }

    public function LuotTruyCapTheoNgay() {
        include("Views/ThongKe/LuotTruyCapTheoNgay.php");
    }

    public function DonHangTheoNgay(){
        include("Views/ThongKe/DonHangTheoNgay.php");
    }

}