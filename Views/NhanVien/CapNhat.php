<?php
    include "./Views/Layout/header.php";
    echo "<title>Update nhân viên</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Nhân viên</span>
    <span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active"href="../NhanVien/DanhSach" >Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    Cập nhật
    </span>
    <hr>
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên nhân viên</label>
        <input type="text" value="<?= $row['TenNhanVien']?>"name="tennhanvien" class="form-control"><br>

        <label class="h6">Giới tính</label>
        <select class="form-select" name="gioitinh">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
        </select>

        <label class="h6">Ngày sinh</label>
        <input type="date" value="<?= $row['NgaySinh']?>"name="ngaysinh" class="form-control"><br>

        <label class="h6">Số điện thoại</label>
        <input type="text" value="<?= $row['SoDienThoai']?>"name="sodienthoai" class="form-control"><br>

        <label class="h6">Email</label>
        <input type="email" value="<?= $row['Email']?>"name="email" class="form-control"><br>

        <label class="h6">Địa chỉ</label>
        <input type="text" value="<?= $row['DiaChi']?>"name="diachi" class="form-control"><br>

        <hr>
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>
    <?php endforeach;?>
</div>
<?php
    include "./Views/Layout/footer.php";
?>