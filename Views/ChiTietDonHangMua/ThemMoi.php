<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm mới đơn hàng mua</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Chi Tiết Đơn hàng mua</span>
    <span>
        <a href="../ChiTietDonHangMua/DanhSach" style="text-decoration: none; color: #000000;" >Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Id đơn hàng mua</label>
        <input type="text" value=""name="iddonhangmua" class="form-control"><br>
        <label class="h6">Id sản phẩm</label>
        <input type="text" value=""name="idsanpham" class="form-control"><br>
        <label class="h6">Số lượng</label>
        <input type="text" value=""name="soluong" class="form-control"><br>
        <label class="h6">Đơn giá áp dụng</label>
        <input type="text" value=""name="dongiaapdung" class="form-control"><br>
        <label class="h6">Thành tiền</label>
        <input type="text" value=""name="thanhtien" class="form-control"><br>

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>