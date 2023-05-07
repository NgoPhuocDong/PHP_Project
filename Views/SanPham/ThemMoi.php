<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Sản Phẩm</span>
    <span>
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active" href="../SanPham/DanhSach">Danh sách</a>
    </span>
    <span class="title-active">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên sản phẩm</label>
        <input type="text" name="tensanpham" class="form-control">

        <label class="h6">Loại sản phẩm</label> <br>
        <select class="form-select" name="idloaisanpham">
            <?php 
                if(!empty($result)):
                foreach ($result as $row) : extract($row)?> 
                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['TenLoaiSanPham']; ?></option>
            <?php endforeach; endif; ?>
        </select> <br>
        
        <label class="h6">Giá</label> <br>
        <input type="text" name="gia" class="form-control"><br>

        <label class="h6">Số lượng</label>
        <input type="text" name="soluong" class="form-control"><br>

        <label class="h6">Mô tả</label> <br>
        <textarea rows="9" cols="70" name="mota" placeholder="Nhập mô tả..."></textarea> <br>

        <label class="h6">Ngày sản xuất</label>
        <input type="date" name="ngaysanxuat" class="form-control"><br>

        <label class="h6">Hình ảnh</label> <br>
        <input type="file" id="file-upload" name="hinhanh"><br>
        

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace('mota');
</script>
<?php
    include "./Views/Layout/footer.php";
?>