<?php
class NhanVien{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT * FROM nhanvien LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongNhanVien() {
        $sql = "SELECT * FROM nhanvien";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TongNhanVienTim($tennhanvien) {
        $sql = "SELECT * FROM nhanvien WHERE tennhanvien LIKE '%$tennhanvien%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
    public function find($id)
    {
        $sql = "SELECT nv.ID,TenNhanVien,GioiTinh,NgaySinh,SoDienThoai, Email, DiaChi
        FROM nhanvien as nv,taikhoannhanvien as tknv
        WHERE nv.ID = tknv.idNhanVien
        AND nv.ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    // public function TimKiem($tennhanvien)
    // {
    //     $sql = "SELECT * FROM nhanvien
    //     WHERE TenNhanVien LIKE '%$tennhanvien%'";
    //     $result = $this->db->select($sql);
    //     return $result;
    // }
    public function TimKiem($tennhanvien)
    {
        $sql = "SELECT * FROM nhanvien
        WHERE ID = '$tennhanvien'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function NhanVien(){
        
    }
    public function GetData()
    {
        $sql = "SELECT * FROM nhanvien";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tennhanvien, $gioitinh, $ngaysinh, $sodienthoai, $email, $diachi)
    {
        $sql = "INSERT INTO nhanvien (TenNhanVien,GioiTinh,NgaySinh,SoDienThoai,Email,DiaChi)
                VALUES ('$tennhanvien', '$gioitinh', '$ngaysinh', '$sodienthoai', '$email', '$diachi')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tennhanvien,$gioitinh,$ngaysinh,$sodienthoai,$email,$diachi)
    {
        $sql = "UPDATE nhanvien SET
        TenNhanVien = '$tennhanvien',
        GioiTinh = '$gioitinh',
        NgaySinh = '$ngaysinh',
        SoDienThoai = '$sodienthoai',
        Email = '$email',
        DiaChi = '$diachi'
        WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
  
    public function Xoa($id)
    {
        $sql = "DELETE FROM nhanvien WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}