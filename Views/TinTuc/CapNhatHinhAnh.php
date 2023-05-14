<?php
    include "./Views/Layout/header.php";
    echo "<title>Update Tin Tức</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Tin Tức</span>
    <span>
        <a href="../TinTuc/DanhSach">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Cập nhật hình ảnh
    </span>
    <hr>
    <?php if(!empty($dataUpdate)):
        foreach ($dataUpdate as $row):extract($row);?>
        <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
            <label class="h6">Cập nhật Hình ảnh (<?=$row['TenTinTuc']?>)</label><br>
            <input type="file" name="hinhanh">
            <hr>
            <input type="submit" value="Update" name="submit" class="btn btn-primary">
        </form>
    <?php endforeach; endif; ?>
</div>

<?php
    include "./Views/Layout/footer.php";
?>