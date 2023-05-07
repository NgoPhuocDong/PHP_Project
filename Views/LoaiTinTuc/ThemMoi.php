<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm mới loại sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Loại Tin Tức</span>
    <span>
        <a class="title-non_active" href="../LoaiTinTuc/DanhSach">Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên loại tin tức</label>
        <input type="text" value=""name="tentintuc" class="form-control"><br>

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>