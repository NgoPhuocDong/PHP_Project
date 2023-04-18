<?php
class DonHangBan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT dh.ID,kh.TenKhachHang,NgayLap,idNhanVienLap,TongTien,TenTrangThai
        FROM donhangban as dh,khachhang as kh,trangthaiban as tt, nhanvien as nv
        WHERE dh.IdKhachHang = kh.ID
        AND dh.IdTrangThai = tt.ID
        AND dh.IdNhanVienLap = nv.ID";
        $result = $this->db->select($sql);
        return $result;
    }
    public function GetDataID($id)
    {
        $sql = "SELECT dh.ID,kh.TenKhachHang,NgayLap,idNhanVienLap,TongTien,TenTrangThai
        FROM donhangban as dh,khachhang as kh,trangthaiban as tt, nhanvien as nv
        WHERE dh.IdKhachHang = kh.ID
        AND dh.IdTrangThai = tt.ID
        AND dh.IdNhanVienLap = nv.ID
        AND dh.ID = '$id' ";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($idnhanvienlap, $idkhachhang, $idtrangthai, $ngaylap, $tongtien)
    {
        $sql = "INSERT INTO donhangban (idNhanVienLap,idKhachHang,idTrangThai,NgayLap,TongTien)
                VALUES ('$idnhanvienlap', '$idkhachhang', '$idtrangthai', '$ngaylap', '$tongtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdNhanVienLap($id,$idnhanvienlap)
    {
        $sql = "UPDATE donhangban SET idnhanvienlap = '$idnhanvienlap' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdKhachHang($id,$idkhachhang)
    {
        $sql = "UPDATE donhangban SET idkhachhang = '$idkhachhang' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTrangThai($id,$idtrangthai)
    {
        $sql = "UPDATE donhangban SET idtrangthai = '$idtrangthai' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatNgayLap($id,$ngaylap)
    {
        $sql = "UPDATE donhangban SET ngaylap = '$ngaylap' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTongTien($id,$tongtien)
    {
        $sql = "UPDATE donhangban SET tongtien = '$tongtien' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM donhangban WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}