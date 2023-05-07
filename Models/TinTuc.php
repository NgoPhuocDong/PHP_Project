<?php

class TinTuc{
    private $db;
    private $conn;

    public function __construct(){
        $this->db = new Database();
    }
    public function ThemMoi($id, $ten, $noidung)
    {
        $sql = "INSERT INTO tintuc(IDLoaiTinTuc,TenTinTuc,NoiDung) 
        VALUES ('$id','$ten','$noidung')";
        $result = $this->db->execute($sql);
        if ($result) {  
            return true;
        } else {
            return false;
        }
    }

    public function DanhSach($item,$offset)
    {
        $sql = "SELECT tt.ID,tt.IDLoaiTinTuc,TenLoaiTinTuc,TenTinTuc, NoiDung, NgayDang
        FROM tintuc as tt,loaitintuc as ltt
        WHERE tt.IDLoaiTinTuc = ltt.ID LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongTinTuc() {
        $sql = "SELECT * FROM tintuc";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TongTinTucTim($tentintuc) {
        $sql = "SELECT * FROM tintuc WHERE tentintuc LIKE '%$tentintuc%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
    public function ChiTiet($id)
    {
        $sql = "SELECT tt.ID,tt.IDLoaiTinTuc,TenLoaiTinTuc,TenTinTuc, NoiDung, NgayDang
        FROM tintuc as tt,loaitintuc as ltt
        WHERE tt.IDLoaiTinTuc = ltt.ID
        AND tt.ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($tentintuc)
    {
        $sql = "SELECT tt.ID,tt.IDLoaiTinTuc,TenLoaiTinTuc,TenTinTuc, NoiDung, NgayDang
        FROM tintuc as tt,loaitintuc as ltt
        WHERE tt.IDLoaiTinTuc = ltt.ID
        AND TenTinTuc LIKE '%$tentintuc%'";
        $result = $this->db->select($sql);
        return $result;
    }
   
    public function CapNhat($id,$idLoaiTinTuc,$tentintuc,$noidung,$ngaydang)
    {
        $sql = "UPDATE tintuc SET
        IDLoaiTinTuc = '$idLoaiTinTuc',
        TenTinTuc = '$tentintuc',
        NoiDung = '$noidung',
        NgayDang = '$ngaydang'
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
        $sql = "DELETE FROM tintuc WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
   
   

