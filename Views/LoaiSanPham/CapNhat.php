<?php
    include "./Views/Layout/header.php";
<<<<<<< HEAD
    echo "<title>Cập nhật sản phẩm</title>";
?>
<h4>Trang cập nhật</h4>
=======
    echo "<title>Thêm mới loại sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Loại sản phẩm</span>
    <span>
        <a href="../LoaiSanPham/DanhSach">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Cập nhật
    </span>
    <hr>
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên loại sản phẩm</label>
        <input type="text" value="<?= $row['TenLoaiSanPham']?>"name="tenloaisanpham" class="form-control"><br>

        <hr>
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>
    <?php endforeach;?>
</div>
>>>>>>> develop
<?php
    include "./Views/Layout/footer.php";
?>