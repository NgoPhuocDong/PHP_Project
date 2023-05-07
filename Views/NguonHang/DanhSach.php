<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách đơn hàng mua</title>";
    include("Controllers/KiemTraQuyen.php");

?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Nguồn hàng</span>
    <span class="title-active">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a href="./DanhSach">Danh Sách</a>
    </span>

</div>
<hr>
<div class="">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <form class="row" method="get">
                    <div class="col-md-8">
                        <input type="text" name="id" class="form-control" placeholder="Nhập id nguồn hàng..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Xem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php if(check('../NguonHang/ThemMoi')) { ?>
                    <a href="../NguonHang/ThemMoi" class="btn btn-primary">Thêm mới</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên nguồn hàng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo</th>
            <th>Người đại diện</th>
            <th>Action</th>
        </tr>
        <?php 
        if(!empty($result)):
            $i = 0;
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>
                <td>
                    <?= $row['TenNguonHang'] ?>
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
                    <?= $row['NgayTao'] ?>
                </td>
                <td>
                    <?= $row['NguoiDaiDien'] ?>
                </td>
                <td>
                    <?php if(check('../NguonHang/CapNhat&id='.$row['ID'])) {  ?>
                    <a href="../NguonHang/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../NguonHang/Xoa&id='.$row['ID'])) {  ?>
                    <a href="../NguonHang/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
        include("Views/NguonHang/PhanTrang.php");
    ?>
        <?php if(isset($_GET['id'])) {?>
        <a class="return" href="../NguonHang/DanhSach">Quay lại danh sách nguồn hàng</a>
        <?php }?>
<?php
    include "./Views/Layout/footer.php";
?>