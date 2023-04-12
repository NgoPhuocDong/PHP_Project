<?php
    include"header.php";
?>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Sản phẩm</span>
    <span>
        Sản phẩm
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
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
                    <input type="text" name="" class="form-control" placeholder="tìm sản phẩm" >
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
                    <button class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>
                Tên sản phẩm
            </th>
            <th>
                Giá
            </th>
            
            <th>
                Ngày sản xuất
            </th>
            <th>
                Loại sản phẩm
            </th>
            <th>
                Số lượng
            </th>
            <th>Hình ảnh</th>
            <th></th>
        </tr> 
            <tr>
                <td>1</td>
                <td>
                    May Tinh
                </td>
                <td>
                    000000
                </td>
                
                <td>
                    1/1
                </td>
                <td>
                    maytinh
                </td>
                <td>
                    1
                </td>
                <td>
                    <a href="#">
                        <img src="Data/usernro.png" style="height: 50px; width: 50px; " />
                    </a>
                </td>
                <td>
                    Cập nhật | Xóa 
                </td>
            </tr>
    </table>
</div>
<?php
    include"footer.php";
?>
