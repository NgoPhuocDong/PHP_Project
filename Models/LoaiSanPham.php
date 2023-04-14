<?php
class LoaiSanPham{
    private $tenloaisanpham;
    private $id;

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT * FROM loaisanpham";
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
}