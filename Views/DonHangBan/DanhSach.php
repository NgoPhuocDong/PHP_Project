<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách đơn hàng bán</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Đơn hàng bán</span>
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
                    <div class="col-md-8">
                    <input type="text" name="" class="form-control" placeholder="tìm đơn hàng bán" >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Xem</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <a href="../DonHangBan/ThemMoi" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Id nhân viên lập</th>
            <th>Id khách hàng</th>
            <th>Id trạng thái</th>
            <th>Ngày lập</th>
            <th>Tổng tiền</th>
        </tr>
        <?php 
        if(!empty($result)):
            $i = 0;
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>
                <td>
                    <?= $row['idNhanVienLap'] ?>
                </td>
                <td>
                    <?= $row['idKhachHang'] ?>
                </td>
                <td>
                    <?= $row['idTrangThai'] ?>
                </td>
                <td>
                    <?= $row['NgayLap'] ?>
                </td>
                <td>
                    <?= $row['TongTien'] ?>
                </td>
                <td>
                    <a href="../DonHangBan/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../DonHangBan/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>