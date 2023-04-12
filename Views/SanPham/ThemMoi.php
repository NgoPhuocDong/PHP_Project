<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm mới sản phẩm</title>";
?>
<!-- <div>
    <h4>Trang thêm mới</h4>
    <a href="../SanPham/DanhSach">hahs</a>
</div> -->
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Sản phẩm</span>
    <span>
        <a href="../SanPham/DanhSach">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên sản phẩm</label>
        <input type="text" value=""name="tensanpham" class="form-control"><br>

        <!-- <label class="h6">Loại sản phẩm</label>
        <select name="loaisanpham" class="form-control">
            <option value="">MacBook</option>
            <option value="">Lenovo</option>
            <option value="">Dell</option>
            <option value="">Asus</option>
        </select><br> -->
        
        <label class="h6">Giá</label>
        <input type="number" value=""name="gia" class="form-control"><br>

        <!-- <label>Image:</label>
        <input type="file" value=""name="image"><br> -->
        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>