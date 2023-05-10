<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm mới đơn hàng mua</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Đơn hàng nhập</span>
    <span>
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active" href="../DonHangMua/DanhSach">Danh sách</a>
    </span>
    
    <span class="title-active">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên nhân viên lập</label>
        <select name="idnhanvienlap" class="form-control">
                <option value="<?= $row['idNhanVienLap']?>">
                <?php if(!empty($ListNhanVien))
                    foreach ($ListNhanVien as $item) : extract($item)?>
                        <option value="<?= $item['ID']?>">
                            <?= $item['TenNhanVien']?>
                        </option>
                <?php endforeach;?>    
            </select><br>
        <label class="h6">Tên nguồn hàng</label>
        <select name="idnguonhang" class="form-control">
                <option value="<?= $row['idNguonHang']?>">
                <?php if(!empty($ListNguonHang))
                    foreach ($ListNguonHang as $itemNH) : extract($itemNH)?>
                        <option value="<?= $itemNH['ID']?>">
                            <?= $itemNH['TenNguonHang']?>
                        </option>
                <?php endforeach;?>    
            </select><br>
        <label class="h6">Id trạng thái</label>
        <input type="text" value=""name="idtrangthai" class="form-control"><br>
        <label class="h6">Ngày lập</label>
        <input type="date" value=""name="ngaylap" class="form-control"><br>
        <label class="h6">Tổng tiền</label>
        <input type="text" value=""name="tongtien" class="form-control"><br>
        <?php
                echo $alert ;
        ?>

        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>