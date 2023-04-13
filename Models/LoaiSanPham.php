<?php
class LoaiSanPham{
    private $db;

    public function __construct(){
        $this->db = new Database();
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
}