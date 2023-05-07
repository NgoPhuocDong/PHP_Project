<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm nguồn hàng</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Nguồn hàng</span>
    <span>
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active" href="../NguonHang/DanhSach" style="text-decoration: none; color: #000000;" >Danh sách</a>
    </span>
    <span class="title-active">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên nguồn hàng</label>
        <input type="text" value=""name="tennguonhang" class="form-control"><br>
        <label class="h6">Số điện thoại</label>
        <input type="text" value=""name="sodienthoai" class="form-control"><br>
        <label class="h6">Email</label>
        <input type="email" value=""name="email" class="form-control"><br>
        <label class="h6">Địa chỉ</label>
        <input type="text" value=""name="diachi" class="form-control"><br>
        <label class="h6">Ngày tạo</label>
        <input type="date" value=""name="ngaytao" class="form-control"><br>
        <label class="h6">Người đại diện</label>
        <input type="text" value=""name="nguoidaidien" class="form-control"><br>
        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>