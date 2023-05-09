<?php

class ChiTietDonHangBan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }   
    public function DanhSach($id,$item,$offset)
    {
        $sql = "SELECT ct.ID, ct.idDonHangBan, sp.TenSanPham, ct.SoLuong, ct.DonGiaApDung, ct.ThanhTien
        FROM chitietdonhangban ct
        JOIN sanpham sp ON ct.idSanPham = sp.ID
        WHERE ct.idDonHangBan = '$id' LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongChiTietDHB() {
        $sql = "SELECT * FROM chitietdonhangban";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function find($id)
    {
        $sql = "SELECT ct.ID, ct.idDonHangBan, ct.idSanPham, sp.TenSanPham, ct.SoLuong, ct.DonGiaApDung, ct.ThanhTien
        FROM chitietdonhangban ct
        JOIN sanpham sp ON ct.idSanPham = sp.ID
        AND ct.ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    
    public function CapNhatTongTien($iddonhangban)
    {
        $sql = "UPDATE donhangban
        SET TongTien = (SELECT SUM(soluong * dongiaapdung) 
                         FROM ChiTietDonHangBan 
                         WHERE idDonHangBan = '$iddonhangban') 
        WHERE ID = '$iddonhangban'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatSoLuong($id,$idsanpham)
    {
        $sql = "UPDATE SanPham
        SET SoLuong = SoLuong - (SELECT soluong 
                         FROM ChiTietDonHangBan
                         WHERE idSanPham = '$idsanpham'
                         AND ID =  '$id') 
        WHERE ID = '$idsanpham'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function SoLuongBanDau($id,$idsanpham)
    {
        $sql = "UPDATE SanPham
        SET SoLuong = SoLuong + (SELECT soluong 
                         FROM ChiTietDonHangBan
                         WHERE idSanPham = '$idsanpham'
                         AND ID =  '$id') 
        WHERE ID = '$idsanpham'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function ThemMoi($iddonhangban,$idsanpham, $soluong, $dongiaapdung)
    {
        $thanhtien= $this->ThanhTien($soluong, $dongiaapdung);
        $sql = "INSERT INTO chitietdonhangban (idDonHangBan,idSanPham,SoLuong,DonGiaApDung,ThanhTien)
                VALUES ($iddonhangban,'$idsanpham', '$soluong', '$dongiaapdung', '$thanhtien')";
        
        $result = mysqli_query($this->db->conn, $sql);
        $id = mysqli_insert_id($this->db->conn);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
            $capnhatsoluong = $this->CapNhatSoLuong($id,$idsanpham);
            return true;
        } else {
            
            return false;
        }
    }
    public function CapNhat($id,$iddonhangban,$idsanpham,$soluong,$dongiaapdung)
    {
        $thanhtien= $this->ThanhTien($soluong, $dongiaapdung);
        $soluongbandau = $this->SoLuongBanDau($id,$idsanpham);
        $sql = "UPDATE chitietdonhangban SET
        idsanpham = '$idsanpham',
        soluong = '$soluong',
        dongiaapdung = '$dongiaapdung',
        thanhtien = '$thanhtien',
        iddonhangban = '$iddonhangban'
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
            $capnhatsoluong = $this->CapNhatSoLuong($id,$idsanpham);
            return true;
        } else {
            return false;
        }
    }
    
    public function Xoa($id,$iddonhangban)
    {
        $sql = "DELETE FROM chitietdonhangban WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
            return true;
        } else {
            return false;
        }
    }
    public function ThanhTien($soluong,$dongiaapdung)
    {
        $thanhTien = null;
        return $thanhTien = $soluong * $dongiaapdung;
    }

}