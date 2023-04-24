<?php
class NhanVien{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach()
    {
        $sql = "SELECT * FROM nhanvien";
        $result = $this->db->select($sql);
        return $result;
    }
    public function find($id)
    {
        $sql = "SELECT nv.ID,TenNhanVien,GioiTinh,NgaySinh,SoDienThoai, Email, DiaChi
        FROM nhanvien as nv,taikhoannhanvien as tknv
        WHERE nv.ID = tknv.idNhanVien
        AND nv.ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($tennhanvien)
    {
        $sql = "SELECT * FROM nhanvien
        WHERE TenNhanVien LIKE '%$tennhanvien%'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function NhanVien(){
        
    }
    public function GetData()
    {
        $sql = "SELECT * FROM nhanvien";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tennhanvien, $gioitinh, $ngaysinh, $sodienthoai, $email, $diachi)
    {
        $sql = "INSERT INTO nhanvien (TenNhanVien,GioiTinh,NgaySinh,SoDienThoai,Email,DiaChi)
                VALUES ('$tennhanvien', '$gioitinh', '$ngaysinh', '$sodienthoai', '$email', '$diachi')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tennhanvien,$gioitinh,$ngaysinh,$sodienthoai,$email,$diachi)
    {
        $sql = "UPDATE nhanvien SET
        tennhanvien = '$tennhanvien',
        gioitinh = '$gioitinh',
        ngaysinh = '$ngaysinh',
        sodienthoai = '$sodienthoai',
        email = '$email',
        diachi = '$diachi'
        WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    // public function CapNhatTenKhachHang($id,$tenkhachhang)
    // {
    //     $sql = "UPDATE khachhang SET tenkhachhang = '$tenkhachhang' WHERE id = '$id'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // public function CapNhatGioiTinh($id,$gioitinh)
    // {
    //     $sql = "UPDATE khachhang SET gioitinh = '$gioitinh' WHERE id = '$id'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // public function CapNhatNgaySinh($id,$ngaysinh)
    // {
    //     $sql = "UPDATE khachhang SET ngaysinh = '$ngaysinh' WHERE id = '$id'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // public function CapNhatSoDienThoai($id,$sodienthoai)
    // {
    //     $sql = "UPDATE khachhang SET sodienthoai = '$sodienthoai' WHERE id = '$id'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // public function CapNhatEmail($id,$email)
    // {
    //     $sql = "UPDATE khachhang SET email = '$email' WHERE id = '$id'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    // public function CapNhatDiaChi($id,$diachi)
    // {
    //     $sql = "UPDATE khachhang SET diachi = '$diachi' WHERE id = '$id'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    public function Xoa($id)
    {
        $sql = "DELETE FROM nhanvien WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}