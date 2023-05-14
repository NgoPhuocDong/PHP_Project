<?php
class LoaiQuyen{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT * FROM nhomquyen ORDER BY vitri ASC LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }

    public function TongLoaiQuyen() {
        $sql = "SELECT * FROM nhomquyen";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TimKiemTheoTenLoaiQuyen($tenquyen)
    {
        // Thực hiện truy vấn SQL để tìm kiếm nhân viên dựa trên tên đăng nhập
        $query = "SELECT * FROM nhomquyen WHERE tenquyen LIKE '%$tenquyen%'";

        // Tiếp tục xử lý truy vấn và trả về kết quả
        $result = $this->db->select($query);
        return $result;
    }
    public function TongLoaiQuyenTim($tenloaiquyen) {
        $sql = "SELECT * FROM nhomquyen WHERE tenquyen LIKE '%$tenloaiquyen%'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function TimKiem($tenquyen)
    {
        $sql = "SELECT * FROM nhomquyen
        WHERE tenquyen = '$tenquyen'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi($tenquyen)
    {
        $sql = "INSERT INTO nhomquyen(tenquyen)
                VALUES ('$tenquyen')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$tenquyen)
    {
        $sql = "UPDATE nhomquyen SET tenquyen = '$tenquyen' WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM nhomquyen WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}