<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm mới đơn hàng mua</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Đơn hàng mua</span>
    <span>
        <a href="../DonHangMua/DanhSach" style="text-decoration: none; color: #000000;" >Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Id nhân viên lập</label>
        <input type="text" value=""name="idnhanvienlap" class="form-control"><br>
        <label class="h6">Id nguồn hàng</label>
        <input type="text" value=""name="idnguonhang" class="form-control"><br>
        <label class="h6">Id trạng thái bán</label>
        <input type="text" value=""name="idtrangthai" class="form-control"><br>
        <label class="h6">Ngày lập</label>
        <input type="date" value=""name="ngaylap" class="form-control"><br>
        <label class="h6">Tổng tiền</label>
        <input type="text" value=""name="tongtien" class="form-control"><br>

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>