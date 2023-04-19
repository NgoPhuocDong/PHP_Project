<?php
class LoaiSanPham{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach()
    {
        $sql = "SELECT * FROM loaisanpham";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($tenloaisanpham)
    {
        $sql = "SELECT * FROM loaisanpham
        WHERE TenLoaiSanPham = '$tenloaisanpham'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tenloaisanpham)
    {
        $sql = "INSERT INTO loaisanpham (tenloaisanpham)
                VALUES ('$tenloaisanpham')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tenloaisanpham)
    {
        $sql = "UPDATE loaisanpham SET tenloaisanpham = '$tenloaisanpham' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM loaisanpham WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}