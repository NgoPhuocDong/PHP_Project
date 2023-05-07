<?php
    include "./Views/Layout/header.php";
    include("Controllers/KiemTraQuyen.php");
    echo "<title>Danh sách loại sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Loại Quyền</span>
    
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
                        <input type="text" name="tenquyen" class="form-control" placeholder="Nhập tên loại quyền..." >
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
                    <?php if(check('../LoaiQuyen/ThemMoi')) {  ?>
                    <a href="../LoaiQuyen/ThemMoi" class="btn btn-primary">Thêm mới</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 mt-3">
    <table class="table table-condensed table-bordered ">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên loại quyền</th>
            <th>Action</th>
        </tr>
        <?php 
        $i = 0;
        if(!empty($result)):
            if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['tenquyen'])) {
                $i = ($current * $item) - $item;
        } 
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
                <td><?= $i ?></td>
                <td>
                    <?= $row['tenquyen'] ?>
                </td>
                <td>
                    <?php if(check('../LoaiQuyen/CapNhat&id='.$row['ID'])) {  ?>
                    <a href="../LoaiQuyen/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../LoaiQuyen/Xoa&id='.$row['ID'])) {  ?>
                    <a href="../LoaiQuyen/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
        include("Views/LoaiQuyen/PhanTrang.php");
    ?>
        <?php if(isset($_GET['tenquyen'])) {?>
        <a class="return" href="../LoaiQuyen/DanhSach">Quay lại danh sách loại quyền</a>
        <?php }?>
    
<?php
    include "./Views/Layout/footer.php";
?>