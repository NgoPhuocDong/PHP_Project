<?php
    include "./Views/Layout/header.php";
    echo "<title>Thêm sản phẩm</title>";
?>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Quyền</span>
    <span>
        <a class="title-non_active" href="../Quyen/DanhSach">Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Thêm mới
    </span>
    <hr>

    <form method="post" class="form-group col-md-7" style="margin: auto;" enctype="multipart/form-data">
        <label class="h6">Tên quyền</label>
        <input type="text" name="ten" class="form-control">

        <label class="h6">Loại quyền</label> <br>
        <select class="form-select" name="idloaiquyen">
            <?php 
                if(!empty($result)):
                foreach ($result as $row) : extract($row)?> 
                    <option value="<?= $row['ID']; ?>"><?= $row['tenquyen']; ?></option>
            <?php endforeach; endif; ?>
        </select> <br>
        
        <label class="h6">URL</label> <br>
        <input type="text" name="duongdan" class="form-control"><br>
        <?php
            echo $alert;
        ?>
        <hr>
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </form>
</div>

<?php
    include "./Views/Layout/footer.php";
?>