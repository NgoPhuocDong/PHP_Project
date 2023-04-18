<?php
include_once("Models/ChiTietDonHangBan.php");

class ChiTietDonHangBanController{
    private $model;
    private $db;
    
    public function __construct(){
        $this->model = new ChiTietDonHangBan();
        $this->db = new Database();
    }

    public function ThemMoi(){
        if (isset($_POST['submit'])) {
            $create = $this->model->ThemMoi($_POST['iddonhangban'],$_POST['idsanpham'],  $_POST['soluong'],$_POST['dongiaapdung'],$_POST['thanhtien']);
            if ($create) {
                header("Location: ./ChiTiet&id=$_POST[iddonhangban]");
            }
        }
        include 'Views/ChiTietDonHangBan/ThemMoi.php';
    }

    
    
}