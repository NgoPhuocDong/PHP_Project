<?php
class ThanhToan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function ThanhToan(){
        
    }
    public function GetData($item,$offset)
    {
        $sql = "SELECT * FROM khachhang LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($id)
    {
        $sql = "SELECT * FROM khachhang
        WHERE ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tenkhachhang,$sodienthoai, $email, $diachi)
    {
        $sql = "INSERT INTO khachhang (TenKhachHang,SoDienThoai,Email,DiaChi)
                VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$diachi')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}