<?php
    include "./Views/Layout/header.php";
    echo "<title>Update Sản Phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Tin tức</span>
    <span> 
        <a style="color: black;" href="../Quyen/DanhSach">Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Cập nhật
    </span>
    <hr>    
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên tin tức</label>
        <input type="text" value="<?= $row['TenTinTuc']?>"name="tentintuc" class="form-control">
        <br>

        <label class="h6">Loại quyền</label>
        <select name="idloaitintuc" class="form-control">
            <option value="<?= $row['IDLoaiTinTuc']?>"><?= $row['TenLoaiTinTuc']?></option>
            <?php if(!empty($result))
                foreach ($result as $item) : extract($item)?>
                    <option value="<?= $item['ID'] ?>"><?= $item['TenLoaiTinTuc']?></option>
            <?php endforeach;?>
        </select>

        <label class="h6">Nội dung</label><br>
        <textarea name="noidung" id="" cols="50" rows="5"><?= $row['NoiDung']?></textarea>
        <hr>
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>
    <?php endforeach;?>
</div>
<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace('mota');
</script>
<?php
    include "./Views/Layout/footer.php";
?>