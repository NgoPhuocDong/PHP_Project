<?php
class SanPham{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT sp.ID,TenLoaiSanPham,TenSanPham, Gia, MoTa, SoLuong, NgaySanXuat, HinhAnh 
        FROM sanpham as sp,loaisanpham as lsp
        WHERE sp.idLoaiSanPham = lsp.ID";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($idLoaiSanPham, $tensanpham, $gia, $mota, $soluong, $ngaysanxuat, $hinhanh)
    {
        $sql = "INSERT INTO sanpham(idLoaiSanPham, TenSanPham, Gia, MoTa, SoLuong, NgaySanXuat, HinhAnh) 
        VALUES ('$idLoaiSanPham', '$tensanpham', '$gia', '$mota', '$soluong', '$ngaysanxuat', '$hinhanh')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function CapNhat($id,$idLoaiSanPham,$tensanpham,$gia,$mota,$soluong,$ngaysanxuat,$hinhanh)
    {
        $sql = "UPDATE sanpham SET
        idLoaiSanPham = '$idLoaiSanPham',
        TenSanPham = '$tensanpham',
        Gia = '$gia',
        MoTa = '$mota',
        SoLuong = '$soluong',
        NgaySanXuat = '$ngaysanxuat',
        HinhAnh = '$hinhanh'
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
        $sql = "DELETE FROM sanpham WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
   
}
