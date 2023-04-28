<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách nhân viên</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Nhân viên</span>
    <span>
        Danh sách
    </span>

</div>
<hr>
<div class="">
<div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <form method="get" class="row">
                    <div class="col-md-8">
                        <input type="text" name="tennhanvien" class="form-control" placeholder="Nhập tên nhân viên..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Tìm</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <a href="../NhanVien/ThemMoi" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên nhân viên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Action</th>
        </tr>
        <?php 
        if(!empty($result)):
            $i = 0;
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>
                <td>
                    <?= $row['TenNhanVien'] ?>
                </td>
                <td>
                    <?= $row['GioiTinh'] ?>
                </td>
                <td>
                    <?= date('d-m-Y',strtotime($row['NgaySinh'])) ?>
                </td>
                <td>
                    <?= $row['SoDienThoai'] ?>
                </td>
                <td>
                    <?= $row['Email'] ?>
                </td>
                <td>
                    <?= $row['DiaChi'] ?>
                </td>
                <td>
                    <a href="../NhanVien/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../NhanVien/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>