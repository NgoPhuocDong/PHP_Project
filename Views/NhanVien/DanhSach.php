<?php
   include "./Views/Layout/header.php";
   include("Controllers/KiemTraQuyen.php");
   echo "<title>Danh sách sản phẩm</title>";
?>
<style>
    
    .return {
        text-align: right;
        margin: 10px 20px 0 0;
        display: block;
        font-weight: bold;
        font-size: 18px;
    }
</style>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Nhân viên</span>
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
                        <input type="text" name="tennhanvien" class="form-control" placeholder="Nhập ID nhân viên..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Tìm</button>
                    </div>
                </form>
            </div>
        
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php if(check('../NhanVien/ThemMoi')) {  ?>
                    <a href="../NhanVien/ThemMoi" class="btn btn-primary">Thêm mới</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên nhân viên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Action</th>
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
                    <?php if($row['GioiTinh'] == 0) {
                        echo "Nữ"; 
                    } else {
                        echo "Nam";
                    } ?>
                </td>
                <td>
                    <?= $row['NgaySinh'] ?>
                </td>
                <td>
                    <?= $row['SoDienThoai'] ?>
                </td>
                <td>
                    <?= $row['Email'] ?>
                </td>
                <td>
                    <?= $row['DiaChi'] ?>
                </td>
                <td>
                    <?php if(check('../NhanVien/CapNhat&id='.$row['ID'])) { ?>
                    <a href="../NhanVien/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../NhanVien/Xoa&id='.$row['ID'])) { ?>
                    <a href="../NhanVien/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
        include("Views/NhanVien/PhanTrang.php");
    ?>
        <?php if(isset($_GET['tennhanvien'])) {?>
        <a class="return" href="../NhanVien/DanhSach">Quay lại danh sách sản phẩm</a>
        <?php }?>
    
<?php
    include "./Views/Layout/footer.php";
?>