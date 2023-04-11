<?php
// include_once("Models/SanPham.php");
namespace Controllers;
use Models\SanPham;

class SanPhamController {  
  
     /* */
     public $model;

     public function DanhSach()    
     {
        include 'Views/SanPham/DanhSach.php';
     }   
      
}