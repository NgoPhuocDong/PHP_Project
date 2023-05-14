<?php
    session_start();
    //gọi hàm kết nối sql(connect) từ class Database trong Models
    include "./Models/loginAdmin.php";
    include "./Models/Database.php";
    $db =  new Database();
   
    $nameController = ucfirst(($_REQUEST['url'] ?? 'TrangChu').'Controller');
    $action = $_REQUEST['action'] ?? header('Location: ./TrangChu/Index');

    include "./Controllers/$nameController.php";
    $controller = new $nameController();
    $controller->$action();

?>