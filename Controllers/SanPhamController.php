<?php
include_once("Models/SanPham.php");
class SanPhamController {  
     /* */
     //private $model;

     public function __construct(){
          //$this->model = new LoaiSanPham();
     }

     public function DanhSach()    
     {
          include 'Views/SanPham/DanhSach.php';
     }   
     public function ThemMoi(){
          // if (isset($_POST['submit'])) {
          //      $tensanpham = $_POST['tensanpham'];
          //      $table = sanpham(ID,idLoaiSanPham,TenSanPham,Gia,GiaTriGiamGia,PhamTramGiamGia	NgaySanXuat	HinhAnh	
          //      )
          //      $result = $this->db->insert();
          //      if ($result) {
          //          header('Location: ./DanhSach');
          //      }
          // }
          include 'Views/SanPham/ThemMoi.php';
     }
     public function CapNhat(){
          include 'Views/SanPham/CapNhat.php';
     }
}