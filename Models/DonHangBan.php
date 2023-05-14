<?php
class DonHangBan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT dh.ID, dh.idTrangThai, kh.TenKhachHang, dh.NgayLap, nv.TenNhanVien, dh.TongTien, tt.TenTrangThai
        FROM donhangban AS dh
        INNER JOIN khachhang AS kh ON dh.IdKhachHang = kh.ID
        INNER JOIN trangthaiban AS tt ON dh.IdTrangThai = tt.ID
        INNER JOIN nhanvien AS nv ON dh.IdNhanVienLap = nv.ID
        ORDER BY dh.ID ASC LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    
    public function TongDonHangBan() {
        $sql = "SELECT * FROM donhangban";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function ChiTiet($id)
    {
        $sql = "SELECT dh.ID,kh.TenKhachHang,NgayLap,nv.TenNhanVien,TongTien,TenTrangThai
        FROM donhangban as dh,khachhang as kh,trangthaiban as tt, nhanvien as nv
        WHERE dh.IdKhachHang = kh.ID
        AND dh.IdTrangThai = tt.ID
        AND dh.IdNhanVienLap = nv.ID
        AND dh.ID = '$id' ";
        $result = $this->db->select($sql);
        return $result;
    }
   
    public function ThemMoi($idnhanvienlap, $idkhachhang, $idtrangthai, $ngaylap, $tongtien)
    {
        $sql = "INSERT INTO donhangban (idNhanVienLap,idKhachHang,idTrangThai,NgayLap,TongTien)
                VALUES ('$idnhanvienlap', '$idkhachhang', 5, '$ngaylap', '$tongtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhat($id,$idnhanvienlap,$idkhachhang,$idtrangthai,$ngaylap,$tongtien)
    {
        $sql = "UPDATE donhangban SET 
        idnhanvienlap = '$idnhanvienlap',
        idkhachhang = '$idkhachhang',
        idtrangthai = '$idtrangthai',
        ngaylap = '$ngaylap',
        tongtien = '$tongtien'
        WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function CapNhatTrangThaiHoanThanhDonHang($id) {
        $sql = "UPDATE donhangban SET 
        idtrangthai = 6
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTrangThaiHuyDonHang($id) {
        $sql = "UPDATE donhangban SET 
        idtrangthai = 4
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTrangThaiDatHangDonHang($id) {
        $sql = "UPDATE donhangban SET 
        idtrangthai = 1
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        return $result;
    }
    public function CapNhatTrangThaiBanDauDonHang($id) {
        $sql = "UPDATE donhangban SET 
        idtrangthai = 5
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        return $result;
    }

    public function TongTienDonHang($id) {
        $sql = "SELECT TongTien from donhangban WHERE ID = '$id'";
        $result = $this->db->select($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function Xoa($id)
    {
        $sql = "DELETE FROM donhangban WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function DanhSachTrangThai() {
        $sql = "SELECT * from trangthaiban";
        $result = $this->db->select($sql);
        return $result;
    }

    public function tentrangthai($id){
        $sql = "SELECT TenTrangThai from trangthaiban WHERE ID='$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function idtrangthai($id){
        $sql = "SELECT idTrangThai from donhangban WHERE ID='$id'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function idtrangthai1($id){
        $sql = "SELECT idTrangThai from donhangban WHERE ID='$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function DanhSachID() {
        $sql = "SELECT ID from donhangban";
        $result = $this->db->select($sql);
        return $result;
    }
    public function DoanhThuDonHangBan() {
        $sql = "SELECT SUM(TongTien) FROM donhangban";
        $result = mysqli_query($this->db->conn, $sql);
        //$result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function ThongKeDonHangBan(){
        $sql = "SELECT TongTien,NgayLap
        FROM donhangban";
        $result = $this->db->select($sql);
        return $result;
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
   
}