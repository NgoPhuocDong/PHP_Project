<?php
class LoaiTinTuc{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT * FROM loaitintuc LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongLoaiTinTuc() {
        $sql = "SELECT * FROM loaitintuc";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TongLoaiTinTucTim($tenloaitintuc) {
        $sql = "SELECT * FROM loaitintuc WHERE tenloaitintuc LIKE '%$tenloaitintuc%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
    public function TimKiem($tenloaitintuc)
    {
        $sql = "SELECT * FROM loaitintuc
        WHERE TenLoaiTinTuc LIKE '%$tenloaitintuc%'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tenloaitintuc)
    {
        $sql = "INSERT INTO loaitintuc(TenLoaiTinTuc)
                VALUES ('$tenloaitintuc')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tenloaitintuc)
    {
        $sql = "UPDATE loaitintuc SET TenLoaiTinTuc = '$tenloaitintuc' WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM loaitintuc WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}