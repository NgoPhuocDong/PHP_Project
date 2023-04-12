<?php
include_once("Models/SanPham.php");

class SanPhamController {  
     /* */
     public $model;

     public function DanhSach()    
     {
          if(isset($_POST['submit'])){
               $tensanpham = $_POST['tensanpham'];
          }
          include 'Views/SanPham/DanhSach.php';
     }   
     public function ThemMoi(){
          include 'Views/SanPham/ThemMoi.php';
     }
     public function CapNhat(){
          include 'Views/SanPham/CapNhat.php';
     }
}