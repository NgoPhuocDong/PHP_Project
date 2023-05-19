<?php

class ChiTietDonHangBan{
    private $db;

    public function __construct(){
        $this->db = new Database();
    }   
    public function DanhSach($id,$item,$offset)
    {
        $sql = "SELECT ct.ID, ct.idDonHangBan, sp.TenSanPham, ct.SoLuong, ct.DonGiaApDung, ct.ThanhTien
        FROM chitietdonhangban ct
        LEFT JOIN sanpham sp ON ct.idSanPham = sp.ID
        WHERE ct.idDonHangBan = '$id' LIMIT ".$item." OFFSET ".$offset;
        $result = $this->db->select($sql);
        return $result;
    }

    public function DanhSach1($id)
    {
        $sql = "SELECT ct.ID, ct.idDonHangBan, sp.ID, ct.idSanPham, sp.TenSanPham, ct.SoLuong, ct.DonGiaApDung, ct.ThanhTien
        FROM chitietdonhangban ct
        JOIN sanpham sp ON ct.idSanPham = sp.ID
        WHERE ct.idDonHangBan = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function DanhSachChiTietDonMua($idkhachhang)
    {
        $sql = "SELECT ctdh.idDonHangBan, sp.TenSanPham, sp.HinhAnh, ctdh.SoLuong, ctdh.DonGiaApDung, ctdh.ThanhTien
        FROM chitietdonhangban AS ctdh
        INNER JOIN donhangban AS dh ON ctdh.idDonHangBan = dh.ID
        INNER JOIN sanpham sp ON ctdh.idSanPham = sp.ID
        WHERE dh.idKhachHang = '$idkhachhang'";

        $result = $this->db->select($sql);
        return $result;
    }

    public function DanhSachDonMua($idkhachhang)
    {
        $sql = "SELECT *
        FROM donhangban AS dh
        WHERE dh.idKhachHang = '$idkhachhang'";

        $result = $this->db->select($sql);
        return $result;
    }


    public function TongChiTietDHB() {
        $sql = "SELECT * FROM chitietdonhangban";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }

    public function find($id)
    {
        $sql = "SELECT ct.ID, ct.idDonHangBan, ct.idSanPham, sp.TenSanPham, ct.SoLuong, ct.DonGiaApDung, ct.ThanhTien
        FROM chitietdonhangban ct
        JOIN sanpham sp ON ct.idSanPham = sp.ID
        AND ct.ID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function LayThongTinKhachHang($id) {
        $sql = "SELECT * from khachhang as kh, donhangban as dh WHERE idKhachHang = kh.ID and dh.ID = $id";
        $result = $this->db->select($sql);
        return $result;
    }

    public function CapNhatSoLuong($id,$idsanpham)
    {
        $sql = "UPDATE SanPham
        SET SoLuong = SoLuong - (SELECT soluong 
                         FROM ChiTietDonHangBan
                         WHERE idSanPham = '$idsanpham'
                         AND ID =  '$id') 
        WHERE ID = '$idsanpham'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function hihi($idsanpham,$tongsoluong) {
        $sql = "UPDATE sanpham
        SET SoLuong = SoLuong - $tongsoluong
        WHERE ID = '$idsanpham'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function hihi1($idsanpham,$tongsoluong) {
        $sql = "UPDATE sanpham
        SET SoLuong = SoLuong + $tongsoluong
        WHERE ID = '$idsanpham'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function ThemMoi($iddonhangban,$idsanpham, $soluong, $dongiaapdung)
    {
        $thanhtien= $this->ThanhTien($soluong, $dongiaapdung);
        $sql = "INSERT INTO chitietdonhangban (idDonHangBan,idSanPham,SoLuong,DonGiaApDung,ThanhTien)
                VALUES ($iddonhangban,'$idsanpham', '$soluong', '$dongiaapdung', '$thanhtien')";
        
        $result = mysqli_query($this->db->conn, $sql);
        $id = mysqli_insert_id($this->db->conn);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
            // $capnhatsoluong = $this->CapNhatSoLuong($id,$idsanpham);
            return true;
        } else {
            return false;
        }
    }

    public  function TaoDonHangSS($idkhachhang,$ngaylap,$dataList){
        $sqlDonHang = "INSERT INTO donhangban (IDKhachHang, idTrangThai, NgayLap) VALUES ($idkhachhang, 5, '$ngaylap')";
            if ($this->db->conn->query($sqlDonHang) === TRUE) {
                $iddonhangban = $this->db->conn->insert_id;
                
                foreach ($dataList as $data) {
                    $idSanPham = $data['idSanPham'];
                    $donGia = $data['donGia'];
                    $soLuong = $data['soLuong'];
        
                    // Thực hiện câu lệnh INSERT
                        $thanhtien = $this->ThanhTien($soLuong, $donGia);
                        $sqlChiTiet = "INSERT INTO chitietdonhangban (idDonHangBan, idSanPham, SoLuong, DonGiaApDung, ThanhTien) VALUES ($iddonhangban, '$idSanPham', '$soLuong', '$donGia', '$thanhtien')";
                        if ($this->db->conn->query($sqlChiTiet) === TRUE) {
                            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
                            
                        } else {
                            $message = "<span style='color: red;'>Đã xảy ra lỗi khi tạo chi tiết đơn hàng.</span>" . $this->db->conn->error;
                            return $message;
                        }
                }
            }else{echo'lỗi foreach';};
    }
    public function TaoDonHang($tenkhachhang,$sodienthoai,$email,$diachi,$ngaylap,$dataList)
    {

        $sqlKhachHang = "INSERT INTO khachhang (TenKhachHang, SoDienThoai, Email, DiaChi) VALUES ('$tenkhachhang', '$sodienthoai', '$email', '$diachi')";
        if ($this->db->conn->query($sqlKhachHang) === TRUE) {
            $idkhachhang = $this->db->conn->insert_id;

            $sqlDonHang = "INSERT INTO donhangban (IDKhachHang, idTrangThai, NgayLap) VALUES ($idkhachhang, 5, '$ngaylap')";
            if ($this->db->conn->query($sqlDonHang) === TRUE) {
                $iddonhangban = $this->db->conn->insert_id;
                
                foreach ($dataList as $data) {
                    $idSanPham = $data['idSanPham'];
                    $donGia = $data['donGia'];
                    $soLuong = $data['soLuong'];
        
                    // Thực hiện câu lệnh INSERT
                        $thanhtien = $this->ThanhTien($soLuong, $donGia);
                        $sqlChiTiet = "INSERT INTO chitietdonhangban (idDonHangBan, idSanPham, SoLuong, DonGiaApDung, ThanhTien) VALUES ($iddonhangban, '$idSanPham', '$soLuong', '$donGia', '$thanhtien')";
                        if ($this->db->conn->query($sqlChiTiet) === TRUE) {
                            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
                            
                        } else {
                            $message = "<span style='color: red;'>Đã xảy ra lỗi khi tạo chi tiết đơn hàng.</span>" . $this->db->conn->error;
                            return $message;
                        }
                }
            }else{echo'lỗi foreach';};
        }

    }

    public function CapNhat($id,$iddonhangban,$idsanpham,$soluong,$dongiaapdung)
    {
        $thanhtien= $this->ThanhTien($soluong, $dongiaapdung);
        $soluongbandau = $this->SoLuongBanDau($id,$idsanpham);
        $sql = "UPDATE chitietdonhangban SET
        idsanpham = '$idsanpham',
        soluong = '$soluong',
        dongiaapdung = '$dongiaapdung',
        thanhtien = '$thanhtien',
        iddonhangban = '$iddonhangban'
        WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
            // $capnhatsoluong = $this->CapNhatSoLuong($id,$idsanpham);
            return true;
        } else {
            return false;
        }
    }

    public function CapNhatTongTien1($id)
    {
        $sql = "UPDATE donhangban set TongTien = 0 WHERE ID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function CapNhatTongTien($iddonhangban)
    {
        $sql = "UPDATE donhangban
        SET TongTien = (SELECT SUM(soluong * dongiaapdung) 
                         FROM ChiTietDonHangBan 
                         WHERE idDonHangBan = '$iddonhangban') 
        WHERE ID = '$iddonhangban'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function Xoa($id,$iddonhangban)
    {
        $sql = "DELETE FROM chitietdonhangban WHERE id = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
            $capnhatsoluong = $this->SoLuongBanDau($id,$iddonhangban);
            return true;
        } else {
            return false;
        }
    }

    public function XoaHet($id) {
        $sql = "DELETE FROM chitietdonhangban WHERE idDonHangBan = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

   

    public function test($id){
        $sql = " SELECT idSanPham, SUM(soluong) AS total_quantity
        FROM chitietdonhangban
        WHERE idDonHangBan = '$id'
        GROUP BY idSanPham";
        $result = $this->db->select($sql);
        return $result;
    }

    public function test1($id){
        $sql = " SELECT *
        FROM chitietdonhangban
        WHERE idDonHangBan = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }

    public function CapNhatTest($id, $idsanpham,$soluong,$dongiaapdung,$thanhtien){
            $thanhtien = $this->ThanhTien($soluong, $dongiaapdung);
            $sql = "UPDATE chitietdonhangban SET soluong = '$soluong',ThanhTien = '$thanhtien' where idDonHangBan = '$id' and idSanPham = '$idsanpham' ";
            $result= $this->db->execute($sql);
            if($result) {
                // $capnhattongtien = $this->CapNhatTongTien($iddonhangban);
                return true;
            }
    }

    public function ThanhTien($soluong,$dongiaapdung)
    {
        $thanhTien = null;
        return $thanhTien = $soluong * $dongiaapdung;
    }

    public function LaySoLuong($id) {
        $sql ="SELECT idSanPham, SoLuong from chitietdonhangban WHERE idDonHangBan = $id";
        $result = $this->db->select($sql);
        return $result;
    }

    public function SoLuongSanPham($id){
        $sql = "SELECT SoLuong from sanpham WHERE ID = $id";
        $result = $this->db->select($sql);
        return $result;
    }

    public function TrangThaiChiTiet($id) {
        $sql = "SELECT dh.idTrangThai from donhangban as dh, chitietdonhangban as ct WHERE ct.idDonHangBan = dh.ID and dh.ID = $id";
        $result = $this->db->select($sql);
        return $result;
    }

    public function LaySoLuong1($id) {
        $sql ="SELECT idSanPham, SoLuong from chitietdonhangban WHERE idDonHangBan = $id";
        $result = $this->db->select($sql);
        return $result;
    }

    public function SoLuongBanDau($id,$idsanpham)
    {
        $sql = "UPDATE SanPham
        SET SoLuong = SoLuong + (SELECT soluong 
                         FROM ChiTietDonHangBan
                         WHERE idSanPham = '$idsanpham'
                         AND ID =  '$id') 
        WHERE ID = '$idsanpham'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function SoLuongDanhSach($iddonhangban)
    {
        // $thanhtien= $this->ThanhTien($soluong, $dongiaapdung);
        $sql = "SELECT * FROM chitietdonhangban as ct, donhangban as dh WHERE dh.ID = ct.idDonHangBan and ct.idDonHangBan = '$iddonhangban'";
        $result = mysqli_query($this->db->conn, $sql);
        $result = $result->num_rows;
        return $result;
    }
 

    public function getSoLuong($idsanpham)
{
    $sql = "SELECT sp.SoLuong FROM sanpham sp
            JOIN chitietdonhangban ct ON sp.ID = ct.idsanpham
            WHERE ct.idsanpham = '$idsanpham'";
    $result = $this->db->select($sql);
    
    // Lấy giá trị số lượng từ kết quả $result
    $soLuong = $result[0]['SoLuong'];
    
    return $soLuong;
}

    

    // public function CapNhatSoLuong($iddonhangban,$id) {
    //     $sql = "UPDATE sanpham as sp
    //     SET sp.SoLuong = sp.SoLuong - (
    //       SELECT SUM(SoLuong) as so_luong_ban
    //       FROM chitietdonhangban as ct,donhangban as dh
    //       WHERE ct.idDonHangBan = dh.ID and ct.idSanPham = '$id' and ct.idDonHangBan = '$iddonhangban')
    //         WHERE ID = '$id'";
    //     $result = $this->db->execute($sql);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
