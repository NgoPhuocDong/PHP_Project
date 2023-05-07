<?php
if (!function_exists('check')) {
    function check($uri = false) {
       // code của hàm check
       $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
        if (empty($_SESSION['dangnhap1']['privileges'])) {
            return false;
        } 
        $privileges = $_SESSION['dangnhap1']['privileges'];
        // var_dump($privileges); exit;
        $privileges = implode("|",$privileges);
       
        preg_match('/' .$privileges .'/', $uri ,$matches);
        
        return !empty($matches);
    }
 }
?>
