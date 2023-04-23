<?php
class TaiKhoanNhanVien{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach()
    {
        $sql = "SELECT tknv.idNhanVien,nv.TenNhanVien ,TenDangNhap,MatKhau, TrangThai, AnhDaiDien
        FROM taikhoannhanvien as tknv,nhanvien as nv
        WHERE tknv.idNhanVien = nv.ID";
        $result = $this->db->select($sql);
        return $result;
    }
    public function find($id)
    {
        $sql = "SELECT tknv.idNhanVien,TenDangNhap,MatKhau, TrangThai, AnhDaiDien
        FROM taikhoannhanvien as tknv,nhanvien as nv
        WHERE tknv.idNhanVien = nv.ID
        AND tknv.idNhanVien = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($tennhanvien)
    {
        $sql = "SELECT tknv.TenDangNhap,nv.TenNhanVien ,tknv.idNhanVien, MatKhau, TrangThai, AnhDaiDien
        FROM taikhoannhanvien as tknv, nhanvien as nv
        WHERE nv.TenNhanVien LIKE '%$tennhanvien%'
        AND tknv.idNhanVien = nv.ID";
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
    public function ThemMoi( $tendangnhap,$idnhanvien, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "INSERT INTO taikhoannhanvien (TenDangNhap,idNhanVien,MatKhau,TrangThai,AnhDaiDien)
                VALUES ('$tendangnhap','$idnhanvien', '$matkhau', '$trangthai', '$anhdaidien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($idnhanvien, $tendangnhap, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "UPDATE taikhoannhanvien SET
        TenDangNhap = '$tendangnhap',
        MatKhau = '$matkhau',
        TrangThai = '$trangthai',
        AnhDaiDien = '$anhdaidien'
        WHERE tknv.idNhanVien = '$idnhanvien'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function Xoa($idnhanvien)
    {
        $sql = "DELETE FROM taikhoannhanvien WHERE idNhanVien = '$idnhanvien'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}