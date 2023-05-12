<?php
class TaiKhoanNhanVien{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT *
        FROM taikhoannhanvien as tknv,nhanvien as nv WHERE tknv.IDNhanVien = nv.ID
        LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }

    public function DanhSach1()
    {
         $sql = "SELECT * FROM taikhoannhanvien as tknv,nhanvien as nv
        WHERE tknv.IDNhanVien = nv.ID";
        $result = $this->db->select($sql);
        return $result;
    }

    // public function DanhSach()
    // {
    //     $sql = "SELECT *
    //     FROM taikhoannhanvien as tk,nhanvien as nv
    //     WHERE tk.IDNhanVien = nv.ID"; 
    //     $result = $this->db->select($sql);
    //     return $result;
    // }
    
    public function TongTaiKhoan() {
        $sql = "SELECT * FROM taikhoannhanvien";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }


    public function TimKiemTheoTenDangNhap($tendangnhap)
{
    // Thực hiện truy vấn SQL để tìm kiếm nhân viên dựa trên tên đăng nhập
    $query = "SELECT * FROM taikhoannhanvien WHERE TenDangNhap LIKE '%$tendangnhap%'";

    // Tiếp tục xử lý truy vấn và trả về kết quả
    $result = $this->db->select($query);
    return $result;
}
    public function find($id)
    {
        $sql = "SELECT tknv.IDNhanVien,TenDangNhap,MatKhau, TrangThai, AnhDaiDien
        FROM taikhoannhanvien as tknv,nhanvien as nv
        WHERE tknv.IDNhanVien = nv.ID
        AND tknv.IDNhanVien = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    // public function TimKiem($tennhanvien)
    // {
    //     $sql = "SELECT tknv.TenDangNhap,nv.TenNhanVien ,tknv.IDNhanVien, MatKhau, TrangThai, AnhDaiDien
    //     FROM taikhoannhanvien as tknv, nhanvien as nv
    //     WHERE nv.TenNhanVien LIKE '%$tennhanvien%'
    //     AND tknv.idNhanVien = nv.ID";
    //     $result = $this->db->select($sql);
    //     return $result;
    // }
    public function TimKiem($id)
    {
        $sql = "SELECT tknv.TenDangNhap,nv.TenNhanVien ,tknv.IDNhanVien, MatKhau, TrangThai, AnhDaiDien
        FROM taikhoannhanvien as tknv, nhanvien as nv
        WHERE tknv.IDNhanVien = $id
        AND tknv.IDNhanVien = nv.ID";
        $result = $this->db->select($sql);
        return $result;
    }
   
    
    public function GetData()
    {
        $sql = "SELECT * FROM taikhoannhanvien";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi( $tendangnhap,$idnhanvien, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "INSERT INTO taikhoannhanvien (TenDangNhap,IDNhanVien,MatKhau,TrangThai,AnhDaiDien)
                VALUES ('$tendangnhap','$idnhanvien', '$matkhau', '$trangthai', '$anhdaidien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id, $tendangnhap, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "UPDATE taikhoannhanvien as tknv SET
        TenDangNhap = '$tendangnhap',
        MatKhau = '$matkhau',
        TrangThai = '$trangthai',
        AnhDaiDien = '$anhdaidien'
        WHERE IDNhanVien = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function Xoa($idnhanvien)
    {
        $sql = "DELETE FROM taikhoannhanvien WHERE IDNhanVien = '$idnhanvien'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}