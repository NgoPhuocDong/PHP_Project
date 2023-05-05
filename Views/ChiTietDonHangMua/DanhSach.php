<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách đơn hàng mua</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Đơn hàng mua</span>
        <a href="../DonHangMua/DanhSach">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Chi tiết
    </span>

</div>
<hr>
<div class="">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="" class="form-control" placeholder="Nhập sản phẩm..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Tìm</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php foreach ($resultDonHang as $row) : extract($row); ?>
                    <a href="../ChiTietDonHangMua/ThemMoi&id=<?= $row['ID']?>" class="btn btn-primary">Thêm mới</a>
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
            <td><?= date('d-m-Y',strtotime($row['NgayLap']))?></td>
        </tr>
        <tr>
            <th>Mã đơn hàng:</th>
            <td><?= $row['ID']?></td>
        </tr>
        <tr>
            <th>Nguồn Hàng:</th>
            <td><?= $row['TenNguonHang']?></td>
        </tr>
        <tr>
            <th>Tổng tiền:</th>
            <td><?= number_format($row['TongTien'],0,'.', '.')?></td>
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
                    <?= number_format($row['DonGiaApDung'],0,'.', '.') ?>
                </td>
                <td>
                    <?= number_format($row['ThanhTien'],0,'.', '.') ?>
                </td>
                <td>
                    <a href="../ChiTietDonHangMua/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../ChiTietDonHangMua/Xoa&id=<?=$row['idDonHangMua']?>&act=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>