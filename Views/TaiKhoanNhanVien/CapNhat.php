<?php
    include "./Views/Layout/header.php";
    echo "<title>Update tài khoản nhân viên</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Nhân viên</span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        <a href="../TaiKhoanNhanVien/DanhSach">Cập nhật</a>
    </span>
    
    <hr>
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">

    <label class="h6">Chọn nhân viên muốn cung cấp tài khoản</label> <br>
        <select class="form-select" name="idnhanvien">
        <?php foreach ($result as $nv) : extract($nv); ?>
            <option value="<?php echo $nv['ID']; ?>"><?php echo $nv['TenNhanVien']; ?></option>
            <?php endforeach; ?>
    </select> <br>

        <label class="h6">Tên đăng nhập</label>
        <input type="text" value="<?php echo $row['TenDangNhap']; ?>"name="tendangnhap" class="form-control"><br>


        <label class="h6">Mật khẩu</label> <br>
        <input type="password" value="<?php echo $row['MatKhau']; ?>" name="matkhau" class="form-control"> <br>

        <label class="h6">Trạng thái</label><br>
        <select class="form-select" name="trangthai"> <br>
            <option value="Active">Active</option>
            <option value="Non-Active">Non-Active</option>
        </select>

        <label class="h6">Ảnh đại diện</label> <br>
        <input type="file" id="file-upload" name="anhdaidien" >

        <hr>
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>
    <?php endforeach;?>
</div>
<?php
    include "./Views/Layout/footer.php";
?>