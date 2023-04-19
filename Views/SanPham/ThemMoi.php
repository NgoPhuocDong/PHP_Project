<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Thêm Sản Phẩm</span>
    <span>
        <a href="../SanPham/DanhSach" style="text-decoration: none; color: #000000;" >Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">

        <label class="h6">Tên sản phẩm</label>
        <input type="text" name="tensanpham" class="form-control">
        
        <label class="h6">Giá</label>
        <input type="text" name="gia" class="form-control"><br>

        <label class="h6">Mô tả</label> <br>
        <textarea rows="9" cols="70" name="mota">Nhập mô tả...</textarea> <br>

        <label class="h6">Số lượng</label>
        <input type="text" name="soluong" class="form-control"><br>

        <label class="h6">Ngày sản xuất</label>
        <input type="date" name="ngaysanxuat" class="form-control"><br>

        <label class="h6">Hình ảnh</label> <br>
        <input type="file" id="file-upload" name="hinhanh"><br>
        

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>