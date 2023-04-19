<?php
class ChiTietDonHangBan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }   
    public function GetData($id)
    {
        $sql = "SELECT ct.ID,ct.idDonHangBan,sp.TenSanPham,ct.SoLuong,DonGiaApDung,ThanhTien
        FROM chitietdonhangban as ct,sanpham as sp
        WHERE ct.idSanPham = sp.ID
        AND idDonHangBan = '$id'";
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
    public function CapNhat($id,$iddonhangban,$idsanpham,$soluong,$dongiaapdung,$thanhtien)
    {
        $sql = "UPDATE chitietdonhangban SET
        idsanpham = '$idsanpham',
        soluong = '$soluong',
        dongiaapdung = '$dongiaapdung',
        thanhtien = '$thanhtien',
        iddonhangban = '$iddonhangban'
        WHERE ID = '$id'";
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