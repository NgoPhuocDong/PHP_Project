<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Chi Tiết Sản Phẩm</span>
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
                    <input type="text" name="search" class="form-control" placeholder="Tìm sản phẩm" >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                    <input type="submit" value="Xem" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <a href="../SanPham/ThemMoi" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Số lượng</th>
            <th>Ngày sản xuất</th>
            <th>Hình ảnh</th>
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
                    <?= $row['Gia'] ?>
                </td>
                <td>
                    <?= $row['MoTa'] ?>
                </td>
                <td>
                    <?= $row['SoLuong'] ?>
                </td>
                <td>
                    <?= $row['NgaySanXuat'] ?>
                </td>
                <td>
                <img src="../Assets/HinhAnhSanPham/<?= $row['HinhAnh'] ?>" alt="img" height="50px" width="50px" >
                </td>
                <td>
                    <a href="../SanPham/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../SanPham/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>

<?php
    include "./Views/Layout/footer.php";
?>