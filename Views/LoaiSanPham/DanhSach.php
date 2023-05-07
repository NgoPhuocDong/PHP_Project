<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách loại sản phẩm</title>";
    include("Controllers/KiemTraQuyen.php");

?>
<style>
     .return {
        text-align: right;
        margin: 10px 20px 0 0;
        display: block;
        font-weight: bold;
        font-size: 18px;
    }
</style>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Loại sản phẩm</span>
    <span class="title-active">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a href="./DanhSach">Danh sách</a>
    </span>

</div>
<hr>
<div class="">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <form method="get" class="row">
                    <div class="col-md-8">
                        <input type="text" name="tenloaisanpham" class="form-control" placeholder="Nhập loại sản phẩm..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary" >Tìm</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php if(check('../LoaiSanPham/ThemMoi')) {  ?>
                    <a href="../LoaiSanPham/ThemMoi" class="btn btn-primary">Thêm mới</a>
                    <?php } ?>
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
            <th>Action</th>
        </tr>
        <?php 
       $i = 0;
       if(!empty($result)):
           if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['tensanpham'])) {
               $i = ($current * $item) - $item;
       } 
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>
                <td>
                    <?= $row['TenLoaiSanPham'] ?>
                </td>
                <td>
                    <?php if(check('../LoaiSanPham/CapNhat&id='.$row['ID'])) {  ?>
                    <a href="../LoaiSanPham/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../LoaiSanPham/CapNhat&id='.$row['ID'])) {  ?>
                    <a href="../LoaiSanPham/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
        include("Views/LoaiSanPham/PhanTrang.php");
    ?>
        <?php if(isset($_GET['tenloaisanpham'])) {?>
        <a class="return" href="../LoaiSanPham/DanhSach">Quay lại danh sách loại sản phẩm</a>
        <?php }?>
    
<?php
    include "./Views/Layout/footer.php";
?>