<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm mới chi tiết đơn hàng bán</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Chi Tiết Đơn hàng bán</span> 
    <span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active" href="../ChiTietDonHangBan/DanhSach&id=<?= $_GET['id']?>">Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Mã đơn hàng bán</label>
        <input type="hidden" value="<?=$_GET['id']?>"name="iddonhangban" class="form-control"><?=$_GET['id']?><br>

        <label class="h6">Tên sản phẩm</label>
        <select name="idsanpham" class="form-control">
            <?php if(!empty($result))
                foreach ($result as $item) : extract($item)?>
                    <option value="<?= $item['ID']?>" data-price="<?= $item['Gia']?>">
                        <?= $item['TenSanPham']?>
                    </option>
            <?php endforeach;?>    
        </select><br>
        

        <label class="h6">Số lượng</label>
        <input type="number" min="1" value=""name="soluong" class="form-control"><br>
        
        <label class="h6">Đơn giá áp dụng</label>
        <input type="text"  id="dongiaapdung" value="" name="dongiaapdung" class="form-control"><br>
        
        <!-- <label class="h6">Thành tiền</label>
        <input type="text" value=""name="thanhtien" class="form-control"><br> -->
        <hr>  
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>
<?php
    include "./Views/Layout/footer.php";
?>
<script>
    $('select').change(function() {
    var selectedOption = $(this).find('option:selected');
    var price = selectedOption.data('price');
    document.getElementById("dongiaapdung").value = price;
});
</script>