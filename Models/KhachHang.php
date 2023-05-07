<?php
class KhachHang{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function KhachHang(){
        
    }
    public function GetData($item,$offset)
    {
        $sql = "SELECT * FROM khachhang LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongKhachHang() {
        $sql = "SELECT * FROM khachhang";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TimKiem($id)
    {
        $sql = "SELECT * FROM khachhang
        WHERE ID = '$id'";
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