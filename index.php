<?php
    //gọi hàm kết nối sql(connect) từ class Database trong Models
    include "./Models/Database.php";
    $db =  new Database();
<<<<<<< HEAD

    $nameController = ucfirst(($_REQUEST['url'] ?? 'Home').'Controller');
    $action = $_REQUEST['action'] ?? 'TrangChu';
=======
   
    $nameController = ucfirst(($_REQUEST['url'] ?? 'Home').'Controller');
    $action = $_REQUEST['action'] ?? header('Location: ./Home/TrangChu');

>>>>>>> develop
    include "./Controllers/$nameController.php";
    $controller = new $nameController();
    $controller->$action();

?>