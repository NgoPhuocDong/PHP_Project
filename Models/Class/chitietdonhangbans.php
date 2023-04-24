<?php
class chitietdonhangbans{
    private $id;
    private $idDonHangBan;
    private $idSanPham;
    private $soLuong;
    private $donGiaApDung;
    private $thanhTien; 
    
    public function __construct($soLuong, $donGiaApDung) {
        $this->soLuong = $soLuong;
        $this->donGiaApDung = $donGiaApDung;
        $this->thanhTien;
    }
}