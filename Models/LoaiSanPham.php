<?php
class LoaiSanPham{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT * FROM loaisanpham LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }

    public function DanhSach1()
    {
        $sql = "SELECT * FROM loaisanpham";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongLoaiSanPham() {
        $sql = "SELECT * FROM loaisanpham";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TongLoaiSanPhamTim($tenloaisanpham) {
        $sql = "SELECT * FROM loaisanpham WHERE tenloaisanpham LIKE '%$tenloaisanpham%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
    public function TimKiem($tenloaisanpham)
    {
        $sql = "SELECT * FROM loaisanpham
        WHERE TenLoaiSanPham LIKE '%$tenloaisanpham%'";
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