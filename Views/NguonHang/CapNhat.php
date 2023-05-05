<?php
    include "./Views/Layout/header.php";
    echo "<title>Update Nguồn Hàng</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Nguồn Hàng</span>
    <span>
        <a href="../NguonHang/DanhSach">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Cập nhật
    </span>
    <hr>
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên nguồn hàng</label>
        <input type="text" value="<?= $row['TenNguonHang']?>"name="tennguonhang" class="form-control"><br>

        <label class="h6">Số điện thoại</label>
        <input type="text" value="<?= $row['SoDienThoai']?>"name="sodienthoai" class="form-control"><br>

        <label class="h6">Email</label>
        <input type="email" value="<?= $row['Email']?>"name="email" class="form-control"><br>

        <label class="h6">Địa chỉ</label>
        <input type="text" value="<?= $row['DiaChi']?>"name="diachi" class="form-control"><br>

        <label class="h6">Ngày tạo</label>
        <input type="date" value="<?= $row['NgayTao']?>"name="ngaytao" class="form-control"><br>

        <label class="h6">Người Đại Diện</label>
        <input type="text" value="<?= $row['NguoiDaiDien']?>"name="nguoidaidien" class="form-control"><br>

        <hr>
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>
    <?php endforeach;?>
</div>
<?php
    include "./Views/Layout/footer.php";
?>