<?php
class DonHangMua{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function DanhSach($item,$offset)
    {
        $sql = "SELECT dh.ID, kh.TenNguonHang, dh.NgayLap, nv.TenNhanVien, dh.TongTien, tt.TenTrangThai
        FROM donhangmua AS dh
        INNER JOIN nguonhang AS kh ON dh.IdNguonHang = kh.ID
        INNER JOIN trangthaimua AS tt ON dh.IdTrangThai = tt.ID
        INNER JOIN nhanvien AS nv ON dh.IdNhanVienLap = nv.ID
        LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }
    public function TongDonHangMua() {
        $sql = "SELECT * FROM donhangmua";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function ChiTiet($id) {
        $sql = "SELECT dh.ID,kh.TenNguonHang,NgayLap,nv.TenNhanVien,TongTien,TenTrangThai
        FROM donhangmua as dh,nguonhang as kh,trangthaimua as tt, nhanvien as nv
        WHERE dh.IdNguonHang = kh.ID
        AND dh.IdTrangThai = tt.ID
        AND dh.IdNhanVienLap = nv.ID
        AND dh.ID = '$id' ";
        $result = $this->db->select($sql);
        return $result;
    }
    
    public function CapNhat($id,$idnhanvienlap,$idnguonhang,$idtrangthai,$ngaylap,$tongtien)
    {
        $sql = "UPDATE donhangmua SET 
        idnhanvienlap = '$idnhanvienlap',
        idnguonhang = '$idnguonhang',
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
    public function ThemMoi($idnhanvienlap, $idnguonhang, $idtrangthai, $ngaylap, $tongtien)
    {
        $sql = "INSERT INTO donhangmua (idNhanVienLap,idNguonHang,idTrangThai,NgayLap,TongTien)
                VALUES ('$idnhanvienlap', '$idnguonhang', '$idtrangthai', '$ngaylap', '$tongtien')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function Xoa($id)
    {
        $sql = "DELETE FROM donhangmua WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}