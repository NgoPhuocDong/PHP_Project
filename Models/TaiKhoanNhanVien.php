<?php
class TaiKhoanNhanVien{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach()
    {
        $sql = "SELECT * FROM taikhoannhanvien";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($tendangnhap)
    {
        $sql = "SELECT * FROM taikhoannhanvien
        WHERE TenDangNhap = '$tendangnhap'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TaiKhoanNhanVien(){
        
    }
    public function GetData()
    {
        $sql = "SELECT * FROM taikhoannhanvien";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($idnhanvien, $tendangnhap, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "INSERT INTO taikhoannhanvien (UserID,TenDangNhap,MatKhau,TrangThai,AnhDaiDien)
                VALUES ('$idnhanvien','$tendangnhap', '$matkhau', '$trangthai', '$anhdaidien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$idnhanvien,$tendangnhap, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "UPDATE taikhoannhanvien SET
        UserID = $idnhanvien,
        TenDangNhap = '$tendangnhap',
        MatKhau = '$matkhau',
        TrangThai = '$trangthai',
        AnhDaiDien = '$anhdaidien'
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function Xoa($idnhanvien)
    {
        $sql = "DELETE FROM taikhoannhanvien WHERE ID = '$idnhanvien'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}