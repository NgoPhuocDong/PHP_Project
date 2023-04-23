<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Sản Phẩm</span>
    <span>
        <a href="../SanPham/DanhSach" style="text-decoration: none; color: #000000;" >Danh sách</a>
    </span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
    <span>
        Chi tiết
    </span>

</div>
<hr>
<div class="row">
<?php foreach ($detail as $row){?> 
    <div class="col-md-4">
        <div class="card">
            <img src="../Assets/data/HinhAnhSanPham/<?= $row['HinhAnh'] ?>" alt="Hình ảnh không tồn tại">
        </div>
    </div>
    <div class="col-md-8">
        <h5><?=$row['TenSanPham']?></h5><br>
        <h6 class="text-primary"><?=$row['Gia']?> đ</h6><br>
        <h6>Mô tả: </h6>
        <div class="card">
            <?=$row['MoTa']?>
        </div>
    </div>
<?php }?>
</div>
    
<?php
    include "./Views/Layout/footer.php";
?>