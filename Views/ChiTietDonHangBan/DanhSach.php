<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách đơn hàng bán</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Chi Tiết Đơn hàng bán</span>
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
                        <input type="text" name="" class="form-control" placeholder="tìm chi tiết đơn hàng bán" >
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
                    <?php foreach ($resultDonHang as $row) : extract($row); ?>
                    <a href="../ChiTietDonHangBan/ThemMoi&id=<?= $row['ID']?>" class="btn btn-primary">Thêm mới</a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <?php foreach ($resultDonHang as $row) : extract($row); ?>
    <table>
        <tr>
            <th>Ngày lập:</th>
            <td><?= $row['NgayLap']?></td>
        </tr>
        <tr>
            <th>Mã đơn hàng:</th>
            <td><?= $row['ID']?></td>
        </tr>
        <tr>
            <th>khách hàng:</th>
            <td><?= $row['TenKhachHang']?></td>
        </tr>
        <tr>
            <th>Tổng tiền:</th>
            <td><?= $row['TongTien']?></td>
        </tr>
    </table>
    <br>
    <?php endforeach;?>
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá áp dụng</th>
            <th>Thành tiền</th>
        </tr>
        <?php 
        if(!empty($result)):
            $i = 0;
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>
                <td>
                    <?= $row['TenSanPham'] ?>
                </td>
                <td>
                    <?= $row['SoLuong'] ?>
                </td>
                <td>
                    <?= $row['DonGiaApDung'] ?>
                </td>
                <td>
                    <?= $row['ThanhTien'] ?>
                </td>
                <td>
                    <a href="../ChiTietDonHangBan/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../ChiTietDonHangBan/Xoa&id=<?=$row['idDonHangBan']?>&act=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>