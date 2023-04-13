<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách loại sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Loại sản phẩm</span>
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
                    <input type="text" name="" class="form-control" placeholder="tìm loại sản phẩm" >
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
                    <a href="../LoaiSanPham/ThemMoi" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên loại sản phẩm</th>
            <th></th>
        </tr> 
            <tr>
                <td>1</td>
                <td>
                    MacBook
                </td>
                <td>
                    <a href="../LoaiSanPham/CapNhat?id='#'">Cập nhật</a> | 
                    <a href="../LoaiSanPham/DanhSach?id='#'">Xóa</a>
                </td>
            </tr>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>