<?php
    //gọi hàm kết nối sql(connect) từ class Database trong Models
    include "./Models/Database.php";
    $db =  new Database();
    $db->connect();

    $nameController = ucfirst(($_REQUEST['url'] ?? 'wellcome').'Controller');
    $action = $_REQUEST['action'] ?? 'index';
    include "./Controllers/$nameController.php";
    $controller = new $nameController();
    $controller->$action();

     //gọi hàm kết nối sql(connect) từ class Database trong Models
     include "./Models/Database.php";
     $db =  new Database();
     $db->connect();
 
     $nameController = ucfirst(($_REQUEST['url'] ?? 'Home').'Controller');
     $action = $_REQUEST['action'] ?? 'TrangChu';
     include "./Controllers/$nameController.php";
     $controller = new $nameController();
     $controller->$action();

?>