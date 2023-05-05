<?php
class NguonHang{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function NguonHang(){
        
    }
    public function GetData()
    {
        $sql = "SELECT * FROM nguonhang";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($id)
    {
        $sql = "SELECT * FROM nguonhang
        WHERE ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tennguonhang, $sodienthoai, $email, $diachi, $ngaytao, $nguoidaidien)
    {
        $sql = "INSERT INTO nguonhang (TenNguonHang,SoDienThoai,Email,DiaChi,NgayTao,NguoiDaiDien)
                VALUES ('$tennguonhang', '$sodienthoai', '$email', '$diachi', '$ngaytao', '$nguoidaidien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tennguonhang, $sodienthoai, $email, $diachi, $ngaytao, $nguoidaidien)
    {
        $sql = "UPDATE nguonhang SET
        tennguonhang = '$tennguonhang',
        sodienthoai = '$sodienthoai',
        email = '$email',
        diachi = '$diachi'
        ngaytao = '$ngaytao',
        nguoidaidien = '$nguoidaidien',
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
        $sql = "DELETE FROM nguonhang WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}