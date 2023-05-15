<?php
include_once("Models/SanPham.php");
include_once("Models/LoaiSanPham.php");//
include_once("Models/TaiKhoanKhachHang.php");//
include_once("Models/loginKhachHang.php");//
include_once("Models/KhachHang.php");//
include_once("Models/ThanhToan.php");
include_once("Models/ChiTietDonHangBan.php");
include_once("Models/Tintuc.php");
class TrangChuController{
    private $model;
    private $loaisanpham;
    private $db;
    private $taikhoan;
    private $login;
    private $khachhang;
    private $thanhtoan;
    private $ctdh;
    private $tintucs;
        
    public function __construct(){
        $this->login = new loginKhachHang();
        $this->khachhang = new KhachHang();
        $this->model = new SanPham();
        $this->loaisanpham = new LoaiSanPham();
        $this->db = new Database();
        $this->taikhoan = new TaiKhoanKhachHang();
        $this->thanhtoan = new ThanhToan();
        $this->ctdh = new ChiTietDonHangBan();
    }
    
    public function DanhMuc(){
        $danhmuc  = $this->loaisanpham->DanhSach(100,0);
        return $danhmuc;
    }
    public function Index()
    {
        $loaisanpham = $this->loaisanpham->DanhSach(100,0);
        //$sanphamnoibat = $this->model->SanPhamNoiBat();
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['tensanpham'])) {
            $tensanpham = $_GET['tensanpham'];
            //gọi method TimKiem bên Models
            $tongsp = $this->model->TongSanPhamTim($tensanpham);
            $totalPage = ceil($tongsp / $item);
            $result = $this->model->TimKiem($tensanpham);
    
            if($_GET['tensanpham'] == null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongSanPham();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result = $this->model->DanhSach($item, $offset);
        }
    
        // Lấy thông tin tin tức
        $tinTucModel = new TinTuc();
        $tintucs = $tinTucModel->DanhSach(3, 0);
    
        include("Views/Home/index.php");
        return array($result, $loaisanpham, $tintucs);
    }
    
    public function ChiTietSanPham(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $detail = $this->model->ChiTiet($id);
        }
        require_once('Views/Home/ChiTietSanPham.php');
        return $detail;
    }

    public function DanhSachSanPham() {
        if(isset($_GET['loaisp'])) {
            $tensanpham = $_GET['loaisp'];
            //gọi method TimKiem bên Models
            $result = $this->model->TenSanPhamTheoLoai($tensanpham);
        }
        //gọi và show dữ liệu ra view
        require_once('Views/Home/SanPhamTheoLoai.php');
        // return $result;
        return $result;
    }
    public function DangNhap(){
        
        if(isset($_POST['submitValue'])) {
            $khachhangUsername = $_POST['username'];
            $khachhangPassword = $_POST['password'];
            $mahoaUser = base64_encode($khachhangUsername);
            $mahoaPass = base64_encode($khachhangPassword);
            $login_check = $this->login->loginAdmin($khachhangUsername, $khachhangPassword,'phucn1435');
            if(isset($_POST['remember']) && $_POST['remember']) {
                setcookie("userKH", $mahoaUser, time()+(86400*7), '/', '', false, true);
                setcookie("passKH", $mahoaPass, time()+(86400*7), '/', '', false, true);
            }
        }

        if (isset($_POST['submitForgot'])) {
            $adminEmail = $_POST['email1'];
            $_SESSION['email'] = $adminEmail;
            $login_check1 = $this->login->forgotAdmin($adminEmail);
        }
        require_once('Views/Home/DangNhap.php');
    }
    public function DangXuat(){
        $_SESSION['user'] = null;
        setcookie("userKH",null, time()-1, '/', '', false, true);
        setcookie("passKH",null, time()-1, '/', '', false, true);
        require_once('Views/Home/Index.php');
    }
    public function TaoTaiKhoan(){
        if(isset($_POST['submit'])) {
            $tenkhachhang = $_POST['tenkhachhang'];
            $tendangnhap = $_POST['tendangnhap'];
            $matkhau = $_POST['matkhau'];
            $matkhau2 = $_POST['matkhau2'];
            if($matkhau2 != $matkhau){
                echo"Mật khẩu nhập lại không trùng khớp";
                header('Location: ./TaoTaiKhoan');
            }else{
                $create = $this->taikhoan->TaoTaiKhoan($tenkhachhang, $tendangnhap, $matkhau);
                header('Location: ./DangNhap');
            }
            
        }
        require_once('Views/Home/TaoTaiKhoan.php');
    }
    public function ThongTinTaiKhoan(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $thongtin = $this->taikhoan->ThongTinTaiKhoan($user);

            if (isset($_POST['update'])) {
                $update = $this->khachhang->CapNhat($_POST['id'],
                                                    $_POST['tenkhachhang'],
                                                    $_POST['gioitinh'],
                                                    $_POST['ngaysinh'],
                                                    $_POST['sodienthoai'],
                                                    $_POST['email'],
                                                    $_POST['diachi']);
                if ($update) {
                    header('Location: ./ThongTinTaiKhoan');
                }else{
                    header('Location: ./ThongTinTaiKhoan');
                }
            }
            if (isset($_POST['upload'])) {
                $file_name = $_FILES['hinhanh']['name'];
                $file_tmp = $_FILES['hinhanh']['tmp_name'];
                move_uploaded_file($file_tmp,"Assets/data/AvatarKhachHang/".$file_name);
                $update = $this->taikhoan->CapNhatAvatar($_POST['id'],$_FILES['hinhanh']['name']);
                if ($update) {
                    header('Location: ./ThongTinTaiKhoan');
                }
            }       
        }
        include('Views/Home/ThongTinTaiKhoan.php');
        return $thongtin;
    }
    public function GioHang(){
        include('Views/GioHang/giohang.php');
    }
    public function ThanhToan()
    {
        if (isset($_POST['submit'])) {
            $tenkhachhang = $_POST['tenkhachhang'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $tongtien = $_POST['tongtien'];
            $idsanpham = $_POST['idsanpham'];
            $soluong = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $ngaylap = $_POST['ngaylap'];

            //$create = $this->thanhtoan->ThemMoi($tenkhachhang, $sodienthoai, $email, $diachi);
            $create = $this->ctdh->TaoDonHang($tenkhachhang,$sodienthoai,$email,$diachi,$ngaylap,$tongtien,
            $idsanpham,$soluong,$dongia);

        }
        include 'Views/ThanhToan/ThanhToan.php';
    }
 }