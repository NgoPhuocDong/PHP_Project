<?php
include_once("Models/TinTuc.php");
include_once("Models/LoaiTinTuc.php");


class TinTucController{
    private $model;
    private $loaitintuc;
    private $db;
    
    public function __construct(){
        $this->model = new TinTuc();
        $this->loaitintuc = new LoaiTinTuc();
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 2;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['tentintuc'])) {
            $tentintuc = $_GET['tentintuc'];
            $tongsp = $this->model->TongTinTucTim($tentintuc);
            $totalPage = ceil($tongsp / $item);
            //gọi method TimKiem bên Models
            $result  = $this->model->TimKiem($tentintuc);
            if($_GET['tentintuc']==null){
                header('Location: ./DanhSach');
            }
        }
        
        else{
            $tongsp = $this->model->TongTinTuc();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result  = $this->model->DanhSach($item,$offset);
        }
    
        //gọi và show dữ liệu ra view
        include 'Views/TinTuc/DanhSach.php';
        return $result;
    }
    public function ChiTiet(){
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $detail = $this->model->ChiTiet($id);
        }
        require_once('Views/SanPham/ChiTiet.php');
        return $detail;
    }
    public function ThemMoi(){
        $limit = $this->loaitintuc->TongLoaiTinTuc();
        $result = $this->loaitintuc->DanhSach($limit,0);
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['idloaitintuc'],
                                            $_POST['tentintuc'],
                                            $_POST['noidung'],
                                            $_POST['ngaydang']);
            if ($create) {
                header('Location: ./DanhSach');
            }
            
        }
        require_once('Views/TinTuc/ThemMoi.php');
    return $result;
    }
    
    
    public function CapNhat(){
        // $result = $this->loaitintuc->DanhSach();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->model->ChiTiet($id);
            if (isset($_POST['submit'])) {

                $update = $this->model->CapNhat($id,$_POST['idloaitintuc'],
                                                    $_POST['tentintuc'],
                                                    $_POST['noidung'],
                                                    $_POST['ngaydang']);

                if ($update) {
                    header('Location: ./DanhSach');
                }
            }            
        }
        include 'Views/TinTuc/CapNhat.php';
        // return array($result,$dataUpdate);
    }
    
    public function Xoa(){
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $this->model->Xoa($id);
            if ($delete) {
                header('Location: ./DanhSach');
            }
        }
    }

}




