<?php
class SanPham{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT * FROM sanpham";
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

    public function CapNhatIdLoaiSanPham($id,$idLoaiSanPham)
    {
        $sql = "UPDATE sanpham SET idLoaiSanPham = '$idLoaiSanPham' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTenSanPham($id,$tensanpham)
    {
        $sql = "UPDATE sanpham SET TenSanPham = '$tensanpham' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatGia($id,$gia)
    {
        $sql = "UPDATE sanpham SET Gia = '$gia' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatMoTa($id,$mota)
    {
        $sql = "UPDATE sanpham SET MoTa = '$mota' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatSoLuong($id,$soluong)
    {
        $sql = "UPDATE sanpham SET SoLuong = '$soluong' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatNgaySanXuat($id,$ngaysanxuat)
    {
        $sql = "UPDATE sanpham SET NgaySanXuat = '$ngaysanxuat' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatHinhAnh($id,$hinhanh)
    {
        $sql = "UPDATE sanpham SET HinhAnh = '$hinhanh' WHERE id = '$id'";
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
