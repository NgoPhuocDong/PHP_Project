<?php

class SanPham{
    private $db;
    private $conn;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT sp.ID,sp.idLoaiSanPham,TenLoaiSanPham,TenSanPham, Gia, MoTa, SoLuong, NgaySanXuat, HinhAnh 
        FROM sanpham as sp,loaisanpham as lsp
        WHERE sp.idLoaiSanPham = lsp.ID LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    
    public function TongSanPham() {
        $sql = "SELECT * FROM sanpham";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function SanPhamNoiBat() {
        $sql = "SELECT * FROM sanpham as sp, trangthaisanpham as tt
        WHERE sp.idTrangThai = tt.ID
        AND tt.TenTrangThai = N'Nổi bật' ";
        // AND tt.ID = 1 ";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TongSanPhamTim($tensanpham) {
        $sql = "SELECT * FROM sanpham WHERE tensanpham LIKE '%$tensanpham%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
    
    public function ChiTiet($id)
    {
        $sql = "SELECT sp.ID,sp.idLoaiSanPham,TenLoaiSanPham,TenSanPham, Gia, MoTa, SoLuong, NgaySanXuat, HinhAnh 
        FROM sanpham as sp,loaisanpham as lsp
        WHERE sp.idLoaiSanPham = lsp.ID
        AND sp.ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function ChiTietSPNB($idTrangThaiSanPham, $index)
{
    $sql = "SELECT sp.ID, sp.idLoaiSanPham, lsp.TenLoaiSanPham, sp.TenSanPham, sp.Gia, sp.MoTa, sp.SoLuong, sp.NgaySanXuat, sp.HinhAnh 
            FROM sanpham AS sp
            JOIN loaisanpham AS lsp ON sp.idLoaiSanPham = lsp.ID
            WHERE sp.idTrangThaiSanPham = '$idTrangThaiSanPham'";
    $result = $this->db->select($sql);
    
    $det = array();
    if ($index >= 0 && $index < count($result)) {
        $det[] = $result[$index];
    }
    
    return $det;
}

    public function TimKiem($tensanpham)
    {
        $sql = "SELECT sp.ID,sp.idLoaiSanPham,TenLoaiSanPham,TenSanPham, Gia, MoTa, SoLuong, NgaySanXuat, HinhAnh 
        FROM sanpham as sp,loaisanpham as lsp
        WHERE sp.idLoaiSanPham = lsp.ID 
        AND TenSanPham LIKE '%$tensanpham%'";
       
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($idloaisanpham, $tensanpham, $gia, $mota, $soluong, $ngaysanxuat, $hinhanh)
    {
        $sql = "INSERT INTO sanpham(idLoaiSanPham,TenSanPham, Gia, MoTa, SoLuong, NgaySanXuat, HinhAnh) 
        VALUES ('$idloaisanpham','$tensanpham', '$gia', '$mota', '$soluong', '$ngaysanxuat', '$hinhanh')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$idLoaiSanPham,$tensanpham,$gia,$mota,$soluong,$ngaysanxuat)
    {
        $sql = "UPDATE sanpham SET
        idLoaiSanPham = '$idLoaiSanPham',
        TenSanPham = '$tensanpham',
        Gia = '$gia',
        MoTa = '$mota',
        SoLuong = '$soluong',
        NgaySanXuat = '$ngaysanxuat'
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function CapNhatHinhAnh($id,$hinhanh)
    {
        $sql = "UPDATE sanpham SET
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
        $sql = "DELETE FROM sanpham WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function DanhSachSanPhamNoiBat() {
        $sql = "SELECT * from sanpham as sp, trangthaisanpham as tt WHERE sp.idTrangThaiSanPham = tt.ID AND sp.idTrangThaiSanPham = 2";
        $result = $this->db->select($sql);
        return $result;
    }
    
    public function DanhSachSanPhamMoiNhat() {
        $sql = "SELECT * from sanpham as sp, trangthaisanpham as tt WHERE sp.idTrangThaiSanPham = tt.ID AND sp.idTrangThaiSanPham  = 1";
        $result = $this->db->select($sql);
        return $result;
    }

    public function TenSanPhamTheoLoai($idloaisanpham) {
        $sql = "SELECT * FROM sanpham as sp, loaisanpham as lsp where lsp.ID = sp.idLoaiSanPham and lsp.ID = '$idloaisanpham'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function LaySanPham($idloaisanpham) {
        $sql = "SELECT sp.ID, lsp.TenLoaiSanPham,sp.HinhAnh,sp.Gia,sp.TenSanPham,sp.idLoaiSanPham
        FROM sanpham as sp, loaisanpham as lsp 
        WHERE lsp.ID = sp.idLoaiSanPham AND lsp.ID = '$idloaisanpham'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function TatCaSanPham() {
        $sql = "SELECT * FROM sanpham";
        $result = $this->db->select($sql);
        return $result;
    }
}
   
   

