<?php
class changePassword{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function CapNhatMatKhau($email,$password)
    {
        $sql = "UPDATE taikhoannhanvien as tk
        JOIN nhanvien as nv ON tk.IDNhanVien = nv.ID
        SET tk.MatKhau = '$test'
        WHERE nv.Email = '$email'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function CapNhatMatKhau1($username,$password)
    {
        // $test = md5($password);
        $test = $password;
        $sql = "UPDATE taikhoannhanvien as tknv SET
        MatKhau = '$password'
        WHERE tknv.TenDangNhap = '$username' ";       
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
   
}