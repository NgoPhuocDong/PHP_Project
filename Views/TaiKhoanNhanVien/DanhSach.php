<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách tài khoản nhân viên</title>";
    include("Controllers/KiemTraQuyen.php");
?>
<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
<style>
    .btn-primary:hover{
        transform: scale(1.2);
        transition: all .2s ease-in-out;
        margin-left: 10px;
    }
    
    .btn-find {
        width: 90px;
    }

    .return {
        text-align: right;
        margin: 10px 20px 0 0;
        display: block;
        font-weight: bold;
        font-size: 18px;
    }
</style>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Tài Khoản Nhân Viên</span>
    <span class="title-active">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Danh sách
    </span>

</div>
<hr>
<div class="">
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-4">
                <form method="get" class="row">
                    <div class="col-md-8">
                        <input type="text" name="tennhanvien" class="form-control" placeholder="Nhập mã nhân viên cần tìm... ">
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Xem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php  if(check('../TaiKhoanNhanVien/ThemMoi')) { ?>
                    <a href="../TaiKhoanNhanVien/ThemMoi" class="btn btn-primary">Thêm mới</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered text-center">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên nhân viên</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Trạng thái</th>
            <th>Ảnh đại diện</th>
            <th>Action</th>
            <!-- <th>Phan quyen</th> -->
        </tr>
        <?php 
        $i = 0;
        if(!empty($result)):
            if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['tennhanvien'])) {
                $i = ($current * $item) - $item;
        } 
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>

                <td>
                <?= $row['TenNhanVien'] ?>
                </td>
            
                <td>
                    <?= $row['TenDangNhap'] ?>
                </td>
                
                <td>
                    <?= $row['MatKhau'] ?>
                </td>
                <td>
                    <?php if($row['TrangThai'] == 1){
                        echo "Active";
                    } else {
                        echo "Non-Active";
                    }
                    ?>
                </td>
                <td>
                <img src="../Assets/AvatarNhanVien/<?= $row['AnhDaiDien'] ?>" alt="img" height="50px" width="50px" >
                </td>
              
                <td>
                    <?php if(check('../TaiKhoanNhanVien/PhanQuyen&id='.$row['IDNhanVien'])) { ?>
                    <a href="../TaiKhoanNhanVien/PhanQuyen&id=<?=$row['IDNhanVien']?>">Phân quyền</a> |
                    <?php } ?>

                    <?php if(check('../TaiKhoanNhanVien/CapNhat&id='.$row['IDNhanVien'])) { ?>
                    <a href="../TaiKhoanNhanVien/CapNhat&id=<?=$row['IDNhanVien']?>">Cập nhật</a> | 
                    <?php } ?>  

                    <?php if(check('../TaiKhoanNhanVien/Xoa&id='.$row['IDNhanVien'])) { ?>
                    <a href="../TaiKhoanNhanVien/Xoa&id=<?=$row['IDNhanVien']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php include("Views/TaiKhoanNhanVien/PhanTrang.php"); ?>
<?php if(isset($_GET['tennhanvien'])) {?>
        <a class="return" href="../TaiKhoanNhanVien/DanhSach">Quay lại danh sách tài khoản nhân viên</a>
        <?php }?>

<?php
    include "./Views/Layout/footer.php";
?>