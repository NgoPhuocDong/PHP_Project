<?php
    include "./Views/Layout/header.php";
    echo "<title>Update dơn hàng bán</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Đơn hàng bán</span>
    <span>
        <a href="../DonHangBan/DanhSach">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Cập nhật
    </span>
    <hr>
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Id nhân viên lập</label>
        <input type="text" value="<?= $row['idNhanVienLap']?>"name="idnhanvienlap" class="form-control"><br>

        <label class="h6">Id khách hàng</label>
        <input type="text" value="<?= $row['idKhachHang']?>"name="idkhachhang" class="form-control"><br>

        <label class="h6">Id trạng thái</label>
        <input type="text" value="<?= $row['idTrangThai']?>"name="idtrangthai" class="form-control"><br>

        <label class="h6">Ngày lập</label>
        <input type="date" value="<?= $row['NgayLap']?>"name="ngaylap" class="form-control"><br>

    
        <label class="h6">Tổng tiền</label>
        <input type="text" value="<?= number_format($row['TongTien'],0,'.', '.')?>"name="tongtien" class="form-control"><br>

        <hr>
        <input type="submit" value="Update" name="submit" class="btn btn-primary">
    </form>
    <?php endforeach;?>
</div>
<?php
    include "./Views/Layout/footer.php";
?>