<?php
    include "./Views/Layout/header.php";
    include("Controllers/KiemTraQuyen.php");
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
    <span class="h3 m-2">Quyền Tài Khoản</span>
   
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
                        <input type="text" name="ten" class="form-control" placeholder="Nhập tên quyền..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary btn-find">Tìm</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php if(check('../Quyen/ThemMoi')) {?>
                    <a href="../Quyen/ThemMoi" class="btn btn-primary">Thêm mới</a>
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
            <th>Tên quyền</th>
            <th>Path</th>
            <th>Nhóm quyền</th>
            <th>Action</th>
        </tr>
        <?php 
        $i=0;
        if(!empty($result)):
            if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['ten'])) {
                $i = ($current * $item) - $item;
            } 
          
            foreach ($result as $row) : extract($row);$i++;?> 
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <?= $row['ten'] ?>
                </td>
                <td>
                    <?= $row['duongdan'] ?>
                </td>
                <td>
                    <?= $row['tenquyen'] ?>
                </td>
                <td>
                    <?php if(check('../Quyen/CapNhat&id='.$row['ID'])) { ?>
                    <a href="../Quyen/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../Quyen/Xoa&id='.$row['ID'])) {?>
                    <a href="../Quyen/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php }?>
                </td>
            </tr>
        <?php endforeach; endif; ?>       
    </table>
</div>
    <?php
        include("Views/Quyen/PhanTrang.php");
    ?>
        <?php if(isset($_GET['ten'])) {?>
        <a class="return" href="../Quyen/DanhSach">Quay lại danh sách quyền</a>
        <?php }?>
    
<?php
    include "./Views/Layout/footer.php";
?>