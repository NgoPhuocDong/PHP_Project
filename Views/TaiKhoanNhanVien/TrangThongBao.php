<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách quyen nhân viên</title>";
?>
<style>
    .notice:hover{        
        color:blue;
        transition: color .3s ease-in-out;
    }
</style>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Tài Khoản Nhân Viên</span>
    <span style="color: blue;"> <i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Thông báo
    </span>
</div>
<hr>
<div class="main-content">
    <div class="content-box">
        <p>
            <span style="color: red;">
                <?php if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['success']);
                }
                ?>
            </span>
            <span style="color: green;">
                <?php  
                if(isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['error']);
            }?>
            </span>
        </p>
    </div>
    <a class="notice" style="font-weight: bold; font-size: 19px;" href="../TaiKhoanNhanVien/DanhSach">Ấn vào đây để quay về.</a>
</div>
<?php
    include "./Views/Layout/footer.php";
?>