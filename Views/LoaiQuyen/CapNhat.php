<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm mới loại sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Loại quyền</span>
    <span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active" href="../LoaiQuyen/DanhSach">Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Cập nhật
    </span>
    <hr> 
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên loại sản phẩm</label>
        <input type="text" value="<?= $row['tenquyen']?>"name="tenquyen" class="form-control"><br>
        <?php
            echo $alert;
        ?>
        <hr>
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>
    <?php endforeach;?>
</div>
<?php
    include "./Views/Layout/footer.php";
?>