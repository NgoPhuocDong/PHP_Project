<?php
include_once("Models/SanPham.php");
include_once("Models/LoaiSanPham.php");//
class TrangChuController{
    private $model;
    private $loaisanpham;
    private $db;
    
    public function __construct(){
        $this->model = new SanPham();
        $this->loaisanpham = new LoaiSanPham();
        $this->db = new Database();
    }
    
    public function DanhMuc()
    {
        $loaisanpham = $this->loaisanpham = new LoaiSanPham();
        include("Views/Home/header.php");
        return $loaisanpham;
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
            $result  = $this->model->TimKiem($tensanpham);
            
            if($_GET['tensanpham']==null){
                header('Location: ./DanhSach');
            }
        }
        else{
            $tongsp = $this->model->TongSanPham();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach($item,$offset);
        }
        include("Views/Home/index.php");
        return array($result,$loaisanpham);
    }
}