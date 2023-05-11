<?php
include_once("Models/SanPham.php");
include_once("Models/DonHangBan.php");

class ThongKeController{
    private $sanpham;
    private $donhangban;
    private $db;

    public function __construct(){
        $this->sanpham = new SanPham();
        $this->donhangban = new DonHangBan();
        $this->db = new Database();
    }
    
    public function ChiTiet(){
        $tongsanpham= $this->sanpham->TongSanPham();
        $tongdonhangban = $this->donhangban->TongDonHangBan();
        $tongtiendonhangban = $this->donhangban->DoanhThuDonHangBan();
        $thongkedonhangban = $this->donhangban->ThongKeDonHangBan();
        include 'Views/ThongKe/chitiet.php';
        return array($tongsanpham,$tongdonhangban,$tongtiendonhangban,$thongkedonhangban);
    }

}