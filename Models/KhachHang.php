<?php
class KhachHang{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function KhachHang(){
        
    }
    public function GetData()
    {
        $sql = "SELECT * FROM khachhang";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tenkhachhang, $gioitinh, $ngaysinh, $sodienthoai, $email, $diachi)
    {
        $sql = "INSERT INTO khachhang (TenKhachHang,GioiTinh,NgaySinh,SoDienThoai,Email,DiaChi)
                VALUES ('$tenkhachhang', '$gioitinh', '$ngaysinh', '$sodienthoai', '$email', '$diachi')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tenkhachhang,$gioitinh,$ngaysinh,$sodienthoai,$email,$diachi)
    {
        $sql = "UPDATE khachhang SET
        tenkhachhang = '$tenkhachhang',
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
    public function CapNhatTenKhachHang($id,$tenkhachhang)
    {
        $sql = "UPDATE khachhang SET tenkhachhang = '$tenkhachhang' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatGioiTinh($id,$gioitinh)
    {
        $sql = "UPDATE khachhang SET gioitinh = '$gioitinh' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatNgaySinh($id,$ngaysinh)
    {
        $sql = "UPDATE khachhang SET ngaysinh = '$ngaysinh' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatSoDienThoai($id,$sodienthoai)
    {
        $sql = "UPDATE khachhang SET sodienthoai = '$sodienthoai' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatEmail($id,$email)
    {
        $sql = "UPDATE khachhang SET email = '$email' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatDiaChi($id,$diachi)
    {
        $sql = "UPDATE khachhang SET diachi = '$diachi' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM khachhang WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}