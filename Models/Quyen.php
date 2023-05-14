<?php

class Quyen{
    private $db;
    private $conn;

    public function __construct(){
        $this->db = new Database();
    }
    public function ThemMoi($id, $ten, $url)
    {
        $sql = "INSERT INTO quyen(ID_group,ten,duongdan) 
        VALUES ('$id','$ten','$url')";
        $result = $this->db->execute($sql);
        if ($result) {  
            return true;
        } else {
            return false;
        }
    }

    public function TongQuyen() {
        $sql = "SELECT * FROM quyen";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
 
    public function TimKiemTheoTenQuyen($ten)
    {
        // Thực hiện truy vấn SQL để tìm kiếm nhân viên dựa trên tên đăng nhập
        $query = "SELECT * FROM quyen WHERE ten LIKE '%$ten%'";

        // Tiếp tục xử lý truy vấn và trả về kết quả
        $result = $this->db->select($query);
        return $result;
    }
    public function TongQuyenTim($tenquyen) {
        $sql = "SELECT * FROM quyen WHERE ten LIKE '%$tenquyen%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function DanhSachQuyen() {
        $sql = "SELECT * FROM quyen";
        $result = $this->db->select($sql);
        return $result;
    }
    
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT q.ID,q.ID_group,tenquyen,ten,duongdan FROM quyen as q, nhomquyen as nq WHERE q.ID_group = nq.ID 
        ORDER BY q.ID_group ASC LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($tenquyen,$item,$offset)
    {
        $sql = "SELECT q.ID,q.ID_group,ten,tenquyen,duongdan FROM quyen as q, nhomquyen as nq WHERE q.ID_group = nq.ID
        AND ten LIKE '%$tenquyen%' LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }


    public function ChiTiet($id)
    {
        $sql = "SELECT q.ID,q.ID_group,tenquyen,ten,duongdan FROM  quyen as q, nhomquyen as nq WHERE q.ID_group = nq.ID
        AND q.ID = '$id'" ;
        $result = $this->db->select($sql);
        return $result;
    }

    public function CapNhat($id,$idgroup,$ten,$url)
    {
        $sql = "UPDATE quyen as q SET
        q.ID_group = '$idgroup',
        q.ten = '$ten',
        q.duongdan = '$url'
        WHERE q.ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function Xoa($id)
    {
        $sql = "DELETE FROM quyen WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
   
   

