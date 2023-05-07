<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm khách hàng</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Khách hàng</span>
    <span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active" href="../KhachHang/DanhSach" >Danh sách</a>
    </span>
    <span class="text-primary title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên khách hàng</label>
        <input type="text" value=""name="tenkhachhang" class="form-control"><br>
        <label class="h6">Giới tính</label>
            <select class="form-select" name="gioitinh">
                <option value=""></option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        <br>
        <label class="h6">Ngày sinh</label>
        <input type="date" value=""name="ngaysinh" class="form-control"><br>
        <label class="h6">Số điện thoại</label>
        <input type="text" value=""name="sodienthoai" class="form-control"><br>
        <label class="h6">Email</label>
        <input type="email" value=""name="email" class="form-control"><br>
        <label class="h6">Địa chỉ</label>
        <input type="text" value=""name="diachi" class="form-control"><br>

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>