<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Tin tức</span>
    <span>
        <a class="title-non_active" href="../TinTuc/DanhSach">Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên tin tức</label>
        <input type="text" name="tentintuc" class="form-control">

        <label class="h6">Loại tin tức</label> <br>
        <select class="form-select" name="idloaitintuc">
            <?php 
                if(!empty($result)):
                foreach ($result as $row) : extract($row)?> 
                    <option value="<?= $row['ID']; ?>"><?= $row['TenLoaiTinTuc']; ?></option>
            <?php endforeach; endif; ?>
        </select> <br>
        
        <label class="h6">Nội dung</label> <br>
        <textarea name="noidung" id="" cols="30" rows="10"></textarea>
        
        <label class="h6">Hình ảnh</label> <br>
        <input type="file" id="file-upload" name="hinhanh"><br>
        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php
    include "./Views/Layout/footer.php";
?>
<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

<script> 
        CKEDITOR.replace('noidung');
        // CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('uploadPhoto').'?_token='.csrf_token() !!}';
</script>