<?php
include_once("Models/ThanhToan.php");
include_once("Models/KhachHang.php");

// class ThanhToanController{
//     private $model;
//     private $db;
//     private $khachhang;
    
//     public function __construct(){
//         $this->model = new ThanhToan();
//         $this->khachhang = new KhachHang();
//         $this->db = new Database();

//         // Bắt đầu session
//         session_start();
//     }

//     // public function DanhSach()
//     // {
//     //     $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
//     //     $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
//     //     $offset = ($current - 1) * $item;
//     //     if(isset($_GET['id'])) {
//     //         $id = $_GET['id'];
//     //         //gọi method TimKiem bên Models
//     //         $totalPage = 0;
//     //         $result  = $this->model->TimKiem($id);
//     //         if($_GET['id']==null){
//     //             header('Location: ./DanhSach');
//     //         }
//     //     }
//     //     else{
//     //         $tongsp = $this->khachhang->TongKhachHang();
//     //         $totalPage = ceil($tongsp / $item);
//     //         //gọi method DanhSach bên Models
//     //         $result  = $this->model->GetData($item,$offset);
//     //     }
//     //     //gọi và show dữ liệu ra view
//     //     include 'Views/Home/ThanhToan.php';
//     //     return $result;
//     // }

//     // public function ThemMoi()
//     // {
//     //     if (isset($_POST['submit'])) {
//     //         $tenkhachhang = $_POST['tenkhachhang'];
//     //         $sodienthoai = $_POST['sodienthoai'];
//     //         $diachi = $_POST['diachi'];
//     //         $create = $this->model->ThemMoi($tenkhachhang, $sodienthoai, $diachi);

//     //         // Thiết lập thông báo vào session
//     //         $_SESSION['thongbao'] = $tenkhachhang . ' - ' . date('H:i:s d/m/Y');
//     //     }

//     //     include 'Views/ThanhToan/ThanhToan.php';
//     // }
// }
