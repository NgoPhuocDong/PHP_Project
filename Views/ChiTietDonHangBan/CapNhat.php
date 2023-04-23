<?php
    include "./Views/Layout/header.php";
    echo "<title>Update dơn hàng bán</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Chi tiết đơn hàng bán</span>
    <span>
    <?php foreach ($dataUpdate as $row) : extract($row); ?>
        <a href="../ChiTietDonHangBan/DanhSach&id=<?= $row['idDonHangBan']?>">Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Cập nhật
    </span>
    <hr>
        <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
            <label class="h6">Id đơn hàng bán</label>
            <input type="text" value="<?= $row['idDonHangBan']?>"name="iddonhangban" class="form-control"><br>

            <label class="h6">Id sản phẩm</label>
            <input type="text" value="<?= $row['idSanPham']?>"name="idsanpham" class="form-control"><br>

            <label class="h6">Số lượng</label>
            <input type="text" value="<?= $row['SoLuong']?>"name="soluong" class="form-control"><br>

            <label class="h6">Đơn giá áp dụng</label>
            <input type="text" value="<?= $row['DonGiaApDung']?>"name="dongiaapdung" class="form-control"><br>

            <label class="h6">Thành tiền</label>
            <input type="text" value="<?= $row['ThanhTien']?>"name="thanhtien" class="form-control"><br>
            <hr>
            <input type="submit" value="Update" name="submit" class="btn btn-primary">
        </form>
    <?php endforeach;?>
</div>
<?php
    include "./Views/Layout/footer.php";
?>