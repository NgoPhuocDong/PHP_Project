<?php

class SanPham{
    private $db;
    private $conn;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach()
    {
        $sql = "SELECT * FROM sanpham";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($sanpham)
    {
        $sql = "SELECT * FROM sanpham
        WHERE TenSanPham = '$sanpham'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tenloaisanpham, $tensanpham, $gia, $mota, $soluong, $ngaysanxuat, $hinhanh)
    {
        $sql = "INSERT INTO sanpham(TenLoaiSanPham,TenSanPham, Gia, MoTa, SoLuong, NgaySanXuat, HinhAnh) 
        VALUES ('$tenloaisanpham','$tensanpham', '$gia', '$mota', '$soluong', '$ngaysanxuat', '$hinhanh')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function CapNhat($id,$tenloaisanpham,$tensanpham, $gia, $mota, $soluong, $ngaysanxuat, $hinhanh)
    {
        $sql = "UPDATE sanpham SET
        TenLoaiSanPham = '$tenloaisanpham',
        TenSanPham = '$tensanpham',
        Gia = '$gia',
        MoTa = '$mota',
        SoLuong = '$soluong',
        NgaySanXuat = '$ngaysanxuat',
        HinhAnh = '$hinhanh'
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function Xoa($id)
    {
        $sql = "DELETE FROM sanpham WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

   
        
 


    }
    // public function TimKiem()
    // {
    //     $search = mysqli_real_escape_string($conn, $_POST['search']);
    //     $sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%$search%'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

   

