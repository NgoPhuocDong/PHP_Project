<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách đơn hàng Mua</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Chi Tiết Đơn hàng mua</span>
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
                    <input type="text" name="" class="form-control" placeholder="tìm chi tiết đơn hàng mua" >
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
                    <a href="../ChiTietDonHangMua/ThemMoi" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Id đơn hàng mua</th>
            <th>Id sản phẩm</th>
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
                    <?= $row['idDonHangMua'] ?>
                </td>
                <td>
                    <?= $row['idSanPham'] ?>
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
                    <a href="../ChiTietDonHangMua/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../ChiTietDonHangMua/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>