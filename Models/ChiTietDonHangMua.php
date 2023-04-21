<?php
class ChiTietDonHangMua{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT * FROM chitietdonhangmua";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($iddonhangmua, $idsanpham, $soluong, $dongiaapdung, $thanhtien)
    {
        $sql = "INSERT INTO donhangmua (idDonHangMua,idSanPham,SoLuong,DonGiaApDung,ThanhTien)
                VALUES ('$iddonhangmua', '$idsanpham', '$soluong', '$dongiaapdung', '$thanhtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdDonHangMua($id,$iddonhangmua)
    {
        $sql = "UPDATE chitietdonhangmua SET iddonhangmua = '$iddonhangmua' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdSanPham($id,$idsanpham)
    {
        $sql = "UPDATE chitietdonhangmua SET idsanpham = '$idsanpham' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatSoLuong($id,$soluong)
    {
        $sql = "UPDATE chitietdonhangmua SET soluong = '$soluong' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatDonGiaApDung($id,$dongiaapdung)
    {
        $sql = "UPDATE chitietdonhangmua SET dongiaapdung = '$dongiaapdung' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatThanhTien($id,$thanhtien)
    {
        $sql = "UPDATE chitietdonhangmua SET thanhtien = '$thanhtien' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM chitietdonhangmua WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}