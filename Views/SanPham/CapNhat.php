<?php
    include "./Views/Layout/header.php";
    echo "<title>Update Sản Phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Sản Phẩm</span>
    <span>
        <a href="../SanPham/DanhSach">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Cập nhật
    </span>
    <hr>
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên sản phẩm</label>
        <input type="text" value="<?= $row['TenSanPham']?>"name="tensanpham" class="form-control"><br>

        <label class="h6">Loại sản phẩm</label>
        <select name="idloaisanpham" class="form-control">
            <option value="<?= $row['idLoaiSanPham'] ?>"><?= $row['TenLoaiSanPham']?></option>
            <?php if(!empty($result))
                foreach ($result as $item) : extract($item)?>
                    <option value="<?= $item['ID'] ?>"><?= $item['TenLoaiSanPham']?></option>
            <?php endforeach;?>
        </select>

        <label class="h6">Giá</label>
        <input type="text" value="<?= $row['Gia']?>"name="gia" class="form-control"><br>

        <label class="h6">Mô tả</label> <br>
        <textarea rows="9" cols="70" name="mota" placeholder="Nhập mô tả..."><?= $row['MoTa']?></textarea><br>
        
        <label class="h6">Số lượng</label>
        <input type="text" value="<?= $row['SoLuong']?>"name="soluong" class="form-control"><br>

        <label class="h6">Ngày sản xuất</label>
        <input type="date" value="<?= $row['NgaySanXuat']?>"name="ngaysanxuat" class="form-control"><br>

        <!-- cập nhật hình ảnh bằng cách ấn vào hình ảnh ở phần danh sách -->
        <!-- <label class="h6">Hình ảnh</label> <br>
        <input type="file" id="file-upload" name="hinhanh" > -->
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