<?php
class LoaiSanPham{
<<<<<<< HEAD
=======

>>>>>>> develop
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
<<<<<<< HEAD
=======
    public function GetData()
    {
        $sql = "SELECT * FROM loaisanpham";
        $result = $this->db->select($sql);
        return $result;
    }
>>>>>>> develop
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
<<<<<<< HEAD
=======
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
>>>>>>> develop
}