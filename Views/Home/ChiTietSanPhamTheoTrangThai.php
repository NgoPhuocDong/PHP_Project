<?php
    include "./Views/HomeLayout/header.php";
    echo "<title>Danh sách sản phẩm</title>";
?>
<div class="container">
    <div class=" col-md-12 mt-2">
        <span class="h3 m-2">Chi Tiết Sản Phẩm</span>
        <span>
            <a href="../TrangChu/Index" style="text-decoration: none; color: #000000;" >Trang chủ</a>
        </span>
    </div>
    <hr>
    <div class="col-md-12 mt-2">
    <?php foreach ($det as $row){?>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="rounded" src="../Assets/data/HinhAnhSanPham/<?= $row['HinhAnh'] ?>" alt="Hình ảnh không tồn tại">
                </div>
            </div>
            <div class="col-md-8">
                <h4><?=$row['TenSanPham']?></h4><br>
                <h5 class="text-danger"><?=number_format($row['Gia'],0,'.', '.')?> đ</h5><br>
                <h5>Loại sản phẩm: <b class="text-primary"><?=$row['TenLoaiSanPham']?></b></h5><br>
                <h5>Kho: <b class="text-danger"><?=$row['SoLuong']?></b></h5><br>
                <div class="row">
                    <a href="../ThanhToan/ThemMoi" class="col-md-5 btn btn-primary p-3 m-2 ">
                        <h5>MUA NGAY</h5>
                    </a>
                    <a href="" class="col-md-5 btn btn-outline-primary p-3 m-2">
                        <h5>THÊM VÀO GIỎ HÀNG</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <h5>Thông tin: </h5>
            <div class="card">
                <?=$row['MoTa']?>
            </div>
        </div>
    <?php }?>
    </div>
</div>
<?php
    include "./Views/Layout/footer.php";
?>