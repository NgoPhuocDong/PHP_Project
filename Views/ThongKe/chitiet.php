<?php
    include "./Views/Layout/header.php";
    echo "<title>Thống kê</title>";
    include("Controllers/KiemTraQuyen.php");
?>
<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
<div class="col-md-12 mt-2 row">
    <span class="h3 m-2">Thống kê</span>
    <hr>
    <div class="card col-ml-25 bg-danger text-white">
        <h4 class="card-item">Sản phẩm</h4>
        <h2><?=$tongsanpham?></h2>
    </div>
    <div class="card col-ml-25 bg-primary text-white">
        <h4 class="card-item">Đơn hàng</h4>
        <h2><?=$tongdonhangban?></h2>
    </div>
    <div class="card col-ml-25 bg-warning text-white">
        <h4 class="card-item">Doanh Thu</h4>
        <h2><?=$tongtiendonhangban?></h2>
    </div>
    <div class="card col-ml-25 bg-success text-white">
        <h4 class="card-item">Lợi nhuận</h4>
        <h2><?=$tongsanpham?></h2>
    </div>
</div>
<style>
    .col-ml-25{
        width: 23%;
        margin: 10px;
        height: 100px;
        text-align: center;
    }
</style>