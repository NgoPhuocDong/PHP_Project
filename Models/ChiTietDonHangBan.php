<?php
class ChiTietDonHangBan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT * FROM chitietdonhangban";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($iddonhangban, $idsanpham, $soluong, $dongiaapdung, $thanhtien)
    {
        $sql = "INSERT INTO donhangban (idDonHangBan,idSanPham,SoLuong,DonGiaApDung,ThanhTien)
                VALUES ('$iddonhangban', '$idsanpham', '$soluong', '$dongiaapdung', '$thanhtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tenloaisanpham)
    {
        $sql = "UPDATE loaisanpham SET tenloaisanpham = '$tenloaisanpham' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}