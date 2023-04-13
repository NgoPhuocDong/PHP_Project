<?php
    if(isset($_GET['controller'])) {
        $tam = $_GET['controller'];
    } else {
        $tam = '';
    }

    switch($tam) {
        case 'product':
            include("controller/productController");
            break;
    }
?>