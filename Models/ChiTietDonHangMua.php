<?php

class ChiTietDonHangMua{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }   
    public function DanhSach($id,$item,$offset)
    {
        $sql = "SELECT ct.ID, ct.idDonHangMua, sp.TenSanPham, ct.SoLuong, ct.DonGiaApDung, ct.ThanhTien
        FROM chitietdonhangmua ct
        JOIN sanpham sp ON ct.idSanPham = sp.ID
        WHERE ct.idDonHangMua = '$id' LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongChiTietDHM() {
        $sql = "SELECT * FROM chitietdonhangmua";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
    public function find($id)
    {
        $sql = "SELECT ct.ID, ct.idDonHangMua, ct.idSanPham, sp.TenSanPham, ct.SoLuong, ct.DonGiaApDung, ct.ThanhTien
        FROM chitietdonhangmua ct
        JOIN sanpham sp ON ct.idSanPham = sp.ID
        AND ct.ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function ThemMoi($iddonhangmua,$idsanpham, $soluong, $dongiaapdung)
    {
        $thanhtien= $this->ThanhTien($soluong, $dongiaapdung);
        $sql = "INSERT INTO chitietdonhangmua (idDonHangMua,idSanPham,SoLuong,DonGiaApDung,ThanhTien)
                VALUES ($iddonhangmua,'$idsanpham', '$soluong', '$dongiaapdung', '$thanhtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangmua);
            return true;
        } else {
            
            return false;
        }
    }
    public function CapNhatTongTien($iddonhangmua)
    {
        $sql = "UPDATE donhangmua
        SET TongTien = (SELECT SUM(soluong * dongiaapdung) 
                         FROM ChiTietDonHangMua 
                         WHERE idDonHangMua = '$iddonhangmua') 
        WHERE ID = '$iddonhangmua'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatSoLuong($idsanpham)
    {
        $sql = "UPDATE SanPham
        SET SoLuong += (SELECT SUM(soluong) 
                         FROM ChiTietDonHangMua as ct, DonHangBan as dh
                         WHERE ct.idSanPham = '$idsanpham'
                         AND ct.idDonHangBan = dh.ID
                         AND dh.idTrangThai = 3) 
        WHERE ID = '$idsanpham'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$iddonhangmua,$idsanpham,$soluong,$dongiaapdung)
    {
        $thanhtien= $this->ThanhTien($soluong, $dongiaapdung);
        //$capnhattongtien = $this->CapNhatTongTien($iddonhangmua);
        $sql = "UPDATE chitietdonhangmua SET
        idsanpham = '$idsanpham',
        soluong = '$soluong',
        dongiaapdung = '$dongiaapdung',
        thanhtien = '$thanhtien',
        iddonhangmua = '$iddonhangmua'
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangmua);
            $capnhatsoluong = $this->CapNhatSoLuong($idsanpham);
            return true;
        } else {
            return false;
        }
    }
    
    public function Xoa($id,$iddonhangmua)
    {
        $sql = "DELETE FROM chitietdonhangmua WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangmua);
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