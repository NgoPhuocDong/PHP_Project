<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm nhân viên</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Thêm Tài khoản nhân viên</span>
    <span>
        <a href="../TaiKhoanNhanVien/DanhSach" style="text-decoration: none; color: #000000;" >Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">

    <label class="h6">Chọn nhân viên muốn cung cấp tài khoản</label> <br>
        <select class="form-select" name="idnhanvien">
        <?php 
        if(!empty($result)):
            foreach ($result as $row) : extract($row);$i++; ?> 
            <option value="<?php echo $row['ID']; ?>"><?php echo $row['TenNhanVien']; ?></option>
            <?php endforeach; endif; ?>
    </select> <br>
        <label class="h6">Tên đăng nhập</label>
        <input type="text" name="tendangnhap" class="form-control">
        
        <label class="h6">Mật khẩu</label>
        <input type="password" name="matkhau" class="form-control"><br>

        <label class="h6">Trạng thái</label>
        <select class="form-select" name="trangthai">
            <option value="Active">Active</option>
            <option value="Non-Active">Non-Active</option>
        </select>

        <label class="h6">Hình ảnh</label> <br>
        <input type="file" id="file-upload" name="anhdaidien"><br>
        

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>