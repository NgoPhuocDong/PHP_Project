<?php
class changePassword{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function CapNhatMatKhau($email,$password)
    {
        $test = md5($password);
        $sql = "UPDATE taikhoanadmin SET password = '$test' WHERE email = '$email'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

   
}