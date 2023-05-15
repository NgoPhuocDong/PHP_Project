<?php
class ThanhToan{
    private $db;

    public function __construct(){
        $this->db = new Database();

        // Bắt đầu session
        //session_start();
    }

    public function ThanhToan(){
        
    }

    public function GetData($item, $offset)
    {
        $sql = "SELECT * FROM khachhang LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }

    public function TimKiem($id)
    {
        $sql = "SELECT * FROM khachhang WHERE ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function ThemMoi($tenkhachhang, $sodienthoai, $email, $diachi)
    {
        $sql = "INSERT INTO khachhang (TenKhachHang, SoDienThoai, Email, DiaChi)
                VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$diachi')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function GetThongBao()
    {
        if (isset($_SESSION['thongbao'])) {
            $thongbao = $_SESSION['thongbao'];
            unset($_SESSION['thongbao']); // Xóa thông báo sau khi lấy ra
            return $thongbao;
        }
        return null;
    }
    
}
