<?php
class ChiTietDonHangBan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }   
    public function GetData($id)
    {
        $sql = "SELECT * FROM chitietdonhangban WHERE idDonHangBan = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    
    public function ThemMoi($iddonhangban,$idsanpham, $soluong, $dongiaapdung, $thanhtien)
    {
        $sql = "INSERT INTO chitietdonhangban (idDonHangBan,idSanPham,SoLuong,DonGiaApDung,ThanhTien)
                VALUES ($iddonhangban,'$idsanpham', '$soluong', '$dongiaapdung', '$thanhtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdDonHangBan($id,$iddonhangban)
    {
        $sql = "UPDATE chitietdonhangban SET iddonhangban = '$iddonhangban' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdSanPham($id,$idsanpham)
    {
        $sql = "UPDATE chitietdonhangban SET idsanpham = '$idsanpham' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatSoLuong($id,$soluong)
    {
        $sql = "UPDATE chitietdonhangban SET soluong = '$soluong' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatDonGiaApDung($id,$dongiaapdung)
    {
        $sql = "UPDATE chitietdonhangban SET dongiaapdung = '$dongiaapdung' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatThanhTien($id,$thanhtien)
    {
        $sql = "UPDATE chitietdonhangban SET thanhtien = '$thanhtien' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM loaisanpham WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}