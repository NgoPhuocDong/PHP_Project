<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách tài khoản nhân viên</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Tài Khoản Nhân Viên</span>
    <span>
        Danh sách
    </span>

</div>
<hr>
<div class="">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <form method="get">
                    <div class="col-md-8">
                    <input type="text" name="tendangnhap" class="form-control" placeholder="Tìm nhân viên" >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                    <input type="submit" value="Xem" name="submit" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <a href="../TaiKhoanNhanVien/ThemMoi" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>ID nhân viên</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Trạng thái</th>
            <th>Ảnh đại diện</th>
        </tr>
        <?php 
        if(!empty($result)):
            $i = 0;
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>

                <td>
                    <?= $row['UserID'] ?>
                </td>

                <td>
                    <?= $row['TenDangNhap'] ?>
                </td>
                
                <td>
                    <?= $row['MatKhau'] ?>
                </td>
                <td>
                    <?= $row['TrangThai'] ?>
                </td>
                <td>
                <img src="../Assets/AvatarNhanVien/<?= $row['AnhDaiDien'] ?>" alt="img" height="50px" width="50px" >
                </td>
                <td>
                    <a href="../TaiKhoanNhanVien/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../TaiKhoanNhanVien/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>