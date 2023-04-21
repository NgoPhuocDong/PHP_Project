<?php
class NguonHang{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData()
    {
        $sql = "SELECT * FROM nguonhang";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tennguonhang, $sodienthoai, $email, $diachi, $ngaytao, $nguoidaidien)
    {
        $sql = "INSERT INTO nguonhang (TenNguonHang,SoDienThoai,Email,DiaChi,NgayTao,NguoiDaiDien)
                VALUES ('$tennguonhang', '$sodienthoai', '$email', '$diachi', '$ngaytao', '$nguoidaidien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTenNguonHang($id,$tennguonhang)
    {
        $sql = "UPDATE nguonhang SET tennguonhang = '$tennguonhang' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatSoDienThoai($id,$sodienthoai)
    {
        $sql = "UPDATE nguonhang SET sodienthoai = '$sodienthoai' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatEmail($id,$email)
    {
        $sql = "UPDATE nguonhang SET email = '$email' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatDiaChi($id,$diachi)
    {
        $sql = "UPDATE nguonhang SET diachi = '$diachi' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatNgayTao($id,$ngaytao)
    {
        $sql = "UPDATE nguonhang SET ngaytao = '$ngaytao' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatNguoiDaiDien($id,$nguoidaidien)
    {
        $sql = "UPDATE nguonhang SET nguoidaidien = '$nguoidaidien' WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM nguonhang WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}