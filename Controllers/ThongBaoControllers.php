<?php
include_once("Models/ThanhToan.php");
include_once("Models/KhachHang.php");

class ThanhToanControllers{
    private $model;
    private $db;
    private $khachhang;
    private $sessionKey = 'thongbao';

    public function __construct(){
        $this->model = new ThanhToan();
        $this->khachhang = new KhachHang();
        $this->db = new Database();
    }

    public function DanhSach(){
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
        $current = !empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //gọi method TimKiem bên Models
            $totalPage = 0;
            $result = $this->model->TimKiem($id);
            if ($_GET['id'] == null) {
                header('Location: ./DanhSach');
            }
        } else {
            $tongsp = $this->khachhang->TongKhachHang();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result = $this->model->GetData($item, $offset);
        }

        // Check if the form was submitted
        if (isset($_POST['submit'])) {
            $tenkhachhang = $_POST['tenkhachhang'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];

            // Save the thông báo to the session
            $thongbao = "Tên khách hàng: $tenkhachhang | Thời gian: " . date('H:i') . " | Ngày đặt hàng: " . date('Y-m-d');
            $_SESSION[$this->sessionKey] = $thongbao;

            // Call the ThanhToan model's ThemMoi method
            $create = $this->model->ThemMoi($tenkhachhang, $sodienthoai, $email, $diachi);
        }

        // Get the thông báo from the session
        $thongbao = isset($_SESSION[$this->sessionKey]) ? $_SESSION[$this->sessionKey] : '';

        //gọi và show dữ liệu ra view
        include 'Views/Home/ThanhToan.php';
        return $result;
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $tenkhachhang = $_POST['tenkhachhang'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];

            // Save the thông báo to the session
            $thongbao = "Tên khách hàng: $tenkhachhang | Thời gian: " . date('H:i') . " | Ngày đặt hàng: " . date('Y-m-d');
            $_SESSION[$this->sessionKey] = $thongbao;
            $create = $this->model->ThemMoi($tenkhachhang, $sodienthoai, $email, $diachi);
        }

        // Get the thông báo from the session
        $thongbao = isset($_SESSION[$this->sessionKey]) ? $_SESSION[$this->sessionKey] : '';

        //gọi và show dữ liệu ra view
        include 'Views/Home/ThanhToan.php';
    }

}