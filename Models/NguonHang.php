<?php
class NguonHang{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function GetData($item,$offset)
    {
        $sql = "SELECT * FROM nguonhang LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongNguonHang() {
        $sql = "SELECT * FROM nguonhang";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TongNguonHangTim($tennguonhang) {
        $sql = "SELECT * FROM nguonhang WHERE TenNguonHang LIKE '%$tennguonhang%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
    public function TimKiem($id)
    {
        $sql = "SELECT * FROM nguonhang
        WHERE ID = '$id'";
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
    public function CapNhat($id,$tennguonhang, $sodienthoai, $email, $diachi, $ngaytao, $nguoidaidien)
    {
        $sql = "UPDATE nguonhang SET
        TenNguonHang = '$tennguonhang',
        SoDienThoai = '$sodienthoai',
        Email = '$email',
        DiaChi = '$diachi',
        NgayTao = '$ngaytao',
        NguoiDaiDien = '$nguoidaidien'
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
        $sql = "DELETE FROM nguonhang WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}