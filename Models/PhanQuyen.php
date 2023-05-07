<?php
class PhanQuyen{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    // public function DanhSachQuyen()
    // {
    //     $sql = "SELECT * FROM quyen";
    //     $result = $this->db->select($sql);
    //     return $result;
    // }

    // public function DanhSachNhomQuyen() {
    //     $sql = "SELECT * FROM nhomquyen ORDER BY nhomquyen.vitri ASC";
    //     $result = $this->db->select($sql);
    //     return $result;
    // }
   
    public function Xoa($id)
    {
        $sql = "DELETE FROM `user_privilege` WHERE  `user_id`= '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function TongNhomQuyen() {
        $sql = "SELECT * FROM nhomquyen";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function Them($insertString) {
        $sql = "INSERT INTO `user_privilege` (`ID`, `user_id`, `privilege_id`) VALUES ".$insertString;
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
   