<?php
namespace Models;

class SanPham {
    public $mayTinh = "Lenovo";
    public function DanhSach(){
        echo $this->mayTinh;
    }
} 