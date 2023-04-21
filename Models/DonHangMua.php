<?php
class DonHangMua{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT * FROM donhangmua";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($idnhanvienlap, $idnguonhang, $idtrangthai, $ngaylap, $tongtien)
    {
        $sql = "INSERT INTO donhangmua (idNhanVienLap,idNguonHang,idTrangThai,NgayLap,TongTien)
                VALUES ('$idnhanvienlap', '$idnguonhang', '$idtrangthai', '$ngaylap', '$tongtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdNhanVienLap($id,$idnhanvienlap)
    {
        $sql = "UPDATE donhangmua SET idnhanvienlap = '$idnhanvienlap' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatIdNguonHang($id,$idnguonhang)
    {
        $sql = "UPDATE donhangmua SET idnguonhang = '$idnguonhang' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTrangThai($id,$idtrangthai)
    {
        $sql = "UPDATE donhangmua SET idtrangthai = '$idtrangthai' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatNgayLap($id,$ngaylap)
    {
        $sql = "UPDATE donhangmua SET ngaylap = '$ngaylap' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTongTien($id,$tongtien)
    {
        $sql = "UPDATE donhangmua SET tongtien = '$tongtien' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM donhangmua WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}