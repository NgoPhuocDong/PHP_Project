<?php
class TaiKhoanKhachHang{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT *
        FROM taikhoankhachhang as tkkh,KhachHang as kh WHERE tkkh.IDKhachHang = kh.ID
        LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }


    // public function DanhSach()
    // {
    //     $sql = "SELECT *
    //     FROM taikhoanKhachHang as tk,KhachHang as kh
    //     WHERE tk.IDKhachHang = kh.ID"; 
    //     $result = $this->db->select($sql);
    //     return $result;
    // }
    
    public function TongTaiKhoan() {
        $sql = "SELECT * FROM taikhoankhachhang";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function find($id)
    {
        $sql = "SELECT tkkh.IDKhachHang,TenDangNhap,MatKhau, TrangThai, AnhDaiDien
        FROM taikhoankhachhang as tkkh,KhachHang as kh
        WHERE tkkh.IDKhachHang = kh.ID
        AND tkkh.IDKhachHang = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiemUser($tendangnhap)
    {
        $sql = "SELECT * FROM taikhoankhachhang
        WHERE TenDangNhap = '$tendangnhap'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function TimKiem($id)
    {
        $sql = "SELECT tkkh.TenDangNhap,kh.TenKhachHang ,tkkh.IDKhachHang, MatKhau, TrangThai, AnhDaiDien
        FROM taikhoankhachhang as tkkh, KhachHang as kh
        WHERE tkkh.IDKhachHang = $id
        AND tkkh.IDKhachHang = kh.ID";
        $result = $this->db->select($sql);
        return $result;
    }
   
    public function GetData()
    {
        $sql = "SELECT * FROM taikhoankhachhang";
        $result = $this->db->select($sql);
        return $result;
    }
    public function ThemMoi( $tendangnhap,$idKhachHang, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "INSERT INTO taikhoankhachhang (TenDangNhap,IDKhachHang,MatKhau,TrangThai,AnhDaiDien)
                VALUES ('$tendangnhap','$idKhachHang', '$matkhau', '$trangthai', '$anhdaidien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id, $tendangnhap, $matkhau, $trangthai, $anhdaidien)
    {
        $sql = "UPDATE taikhoankhachhang as tkkh SET
        TenDangNhap = '$tendangnhap',
        MatKhau = '$matkhau',
        TrangThai = '$trangthai',
        AnhDaiDien = '$anhdaidien'
        WHERE IDKhachHang = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function TaoTaiKhoan($tenkhachhang,$tendangnhap,$matkhau){
        $sqlKhachHang = "INSERT INTO KhachHang (TenKhachHang) VALUES ('$tenkhachhang')";
        if ($this->db->conn->query($sqlKhachHang) === TRUE) {
            // Lấy ID của khách hàng vừa được thêm
            $idkhachhang = $this->db->conn->insert_id;
            $sqlTaiKhoan = "INSERT INTO TaiKhoanKhachHang (TenDangNhap, IDKhachHang, MatKhau,TrangThai) VALUES ('$tendangnhap','$idkhachhang', '$matkhau',1)";
            if ($this->db->conn->query($sqlTaiKhoan) === TRUE) {
                $message = "<span style='color: red;'>Tạo tài khoản thành công.</span>";
                    return $message;
            } else {
                $message = "<span style='color: red;'>Đã xảy ra lỗi, tạo tài khoản thất bại.</span>". $this->db->conn->error;
                    return $message;
            }
        }
        
    }
    public function Xoa($idKhachHang)
    {
        $sql = "DELETE FROM taikhoankhachhang WHERE IDKhachHang = '$idKhachHang'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function DanhSach1()
    {
         $sql = "SELECT * FROM taikhoankhachhang as tkkh,KhachHang as kh
        WHERE tkkh.IDKhachHang = kh.ID";
        $result = $this->db->select($sql);
        return $result;
    }

    public function CapNhatAvatar($id,$hinhanh)
    {
        $sql = "UPDATE taikhoankhachhang SET
        AnhDaiDien = '$hinhanh'
        WHERE IDKhachHang = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function ThongTinTaiKhoan($tendangnhap){
        $sql = "SELECT *
        FROM khachhang as kh
        JOIN taikhoankhachhang as tk ON kh.ID = tk.IDKhachHang
        WHERE tk.TenDangNhap = '$tendangnhap'";
        $result = $this->db->select($sql);
        return $result;
    }
}