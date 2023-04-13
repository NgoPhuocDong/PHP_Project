<?php 
    include("productController/classProduct.php") ;
    // include("../view/productView/addProduct.php");
    // include("../model/database.php");
    // include("../helpers/format.php");
?>

<?php
    $cat = new category();

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $catName = $_POST['tendanhmuc'];    

    //     $insertCat = $cat->insert_category($catName);
    // }

    if (isset($_POST['themdanhmuc'])) {
        $catName = $_POST['tendanhmuc'];
        $insertCat = $cat->insert_category($catName);
    }
?>