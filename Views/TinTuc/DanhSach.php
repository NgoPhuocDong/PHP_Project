<?php
    include "./Views/Layout/header.php";
    include("Controllers/KiemTraQuyen.php");
    include_once("/Models/TinTuc.php");
    echo "<title>Danh sách sản phẩm</title>";
?>
<style>
    .btn-primary:hover{
        transform: scale(1.2);
        transition: all .2s ease-in-out;
        margin-left: 10px;
    }
    
    .btn-find {
        width: 90px;
    }

    .return {
        text-align: right;
        margin: 10px 20px 0 0;
        display: block;
        font-weight: bold;
        font-size: 18px;
    }
</style>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Tin tức</span>
   
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
                        <input type="text" name="tentintuc" class="form-control" placeholder="Nhập tên tin tức..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary btn-find">Tìm</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <a class="btn btn-danger">Import</a>
                    <a href="../TinTuc/Export" class="btn btn-success">Export</a>
                    <?php if(check('../TinTuc/ThemMoi')) { ?>
                    <a href="../TinTuc/ThemMoi" class="btn btn-primary">Thêm mới</a>
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
            <th>Tên tin tức</th>
            <th>Loại tin tức</th>
            <th>Nội dung</th>
            <th>Ngày đăng tin</th>
            <th>Hình ảnh</th>
            <th>Action</th>
        </tr>
        <?php 
        $i=0;
        if(!empty($result)):
            if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['tentintuc'])) {
                $i = ($current * $item) - $item;
            } 
          
            foreach ($result as $row) : extract($row);$i++;?> 
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $row['TenTinTuc'] ?>
                </td>
                <td>
                    <?= $row['TenLoaiTinTuc'] ?>
                </td>
                <td>
                    <?= $row['NoiDung'] ?>
                </td>
                <td>
                    <?php date_default_timezone_set('Asia/Ho_Chi_Minh');
                        echo date('Y-m-d H:i:s'); ?>
                </td>
                <td>
                    <a href="../TinTuc/CapNhatHinhAnh&id=<?=$row['ID']?>">
                        <img src="../Assets/data/HinhAnhTinTuc/<?= $row['HinhAnh'] ?>" alt="TAP" height="50px" width="50px" >
                    </a>
                </td>
                <td>
                <a href="../TinTuc/ChiTiet&id=<?=$row['ID']?>">Chi tiết</a> | 
                    <?php if(check('../TinTuc/CapNhat&id='.$row['ID'])) { ?>
                    <a href="../TinTuc/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../TinTuc/Xoa&id='.$row['ID'])) { ?>
                    <a href="../TinTuc/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>       
    </table>
</div>
<?php
        include("Views/TinTuc/PhanTrang.php");
    ?>
        <?php if(isset($_GET['tentintuc'])) {?>
        <a class="return" href="../TinTuc/DanhSach">Quay lại danh sách sản phẩm</a>
        <?php }?>
    
<?php
    include "./Views/Layout/footer.php";
?>
