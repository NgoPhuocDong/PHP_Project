<?php
include_once("Models/Quyen.php");
include_once("Models/LoaiQuyen.php");//

class QuyenController{
    private $model;
    private $loaiquyen;
    private $db;
    
    public function __construct(){
        $this->model = new Quyen();
        $this->loaiquyen = new LoaiQuyen;
        $this->db = new Database();
    }
    
    public function DanhSach()
    {
        $item = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
        $current =!empty($_GET['page']) ? $_GET['page'] : 1; // trang hien tai
        $offset = ($current - 1) * $item;
        if(isset($_GET['ten'])) {
            $tenquyen = $_GET['ten'];
            //gọi method TimKiem bên Models
            $tongsp = $this->model->TongQuyenTim($tenquyen);
            $totalPage = ceil($tongsp / $item);
            $result  = $this->model->TimKiem($tenquyen,$item,$offset);
            if($_GET['ten']==null){
                header('Location: ./DanhSach');
            }
        } else{
            $tongsp = $this->model->TongQuyen();
            $totalPage = ceil($tongsp / $item);
            //gọi method DanhSach bên Models
            $result = $this->model->DanhSach($item, $offset);
        }
        //gọi và show dữ liệu ra view
        include 'Views/Quyen/DanhSach.php';
        return $result;
    }
    
    public function ThemMoi(){
        $limit = $this->loaiquyen->TongLoaiQuyen();
        $result = $this->loaiquyen->DanhSach($limit, 0);
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['idloaiquyen'],
                                            $_POST['ten'],
                                            $_POST['duongdan']);
            if ($create) {
                header('Location: ./DanhSach');
            }   
        }
        require_once('Views/Quyen/ThemMoi.php');
        return $result;
    }
 
    public function CapNhat(){
        $limit = $this->loaiquyen->TongLoaiQuyen();
        $result = $this->loaiquyen->DanhSach($limit,0);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //lấy dữ liệu cần cập nhật
            $dataUpdate = $this->model->ChiTiet($id);
            if (isset($_POST['submit'])) {

                $update = $this->model->CapNhat($id,$_POST['idloaiquyen'],
                                                    $_POST['ten'],
                                                    $_POST['duongdan']);

                if ($update) {
                    header('Location: ./DanhSach');
                }
            }            
        }
        include 'Views/Quyen/CapNhat.php';
        return array($result,$dataUpdate);
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
