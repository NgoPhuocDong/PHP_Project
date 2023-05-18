<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách đơn hàng bán</title>";
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
    .cancel{ 
        width: 100%;
        background: #e4ba00;
        padding-bottom: 40px;
        border-top: 5px solid yellow;
        border-radius: 5px;
        position: relative;
    }

    .title-cancel{
        position: absolute;
        left: 20px;
        font-weight: 600;
        bottom: 10px;
    }
</style>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Đơn hàng bán</span>
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        <a class="title-non_active" href="../DonHangBan/DanhSach">Danh sách</a>
    </span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Chi tiết
    </span>

</div>
<hr>
<div class="">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="" class="form-control" placeholder="Nhập sản phẩm..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Tìm</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php foreach ($resultDonHang as $row) : extract($row); ?>
                    <?php if($row['idTrangThai'] == 6) { ?>
                        <a href="#" class="btn btn-secondary" style="cursor: default; pointer-events: none" disabled>Thêm mới</a>
                    <?php  } else { ?>
                        <a  href="../ChiTietDonHangBan/ThemMoi&id=<?= $row['ID']?>" class="btn btn-primary">Thêm mới</a>
                    <?php } ?>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 mt-3">
    <?php foreach ($resultDonHang as $row) : extract($row); ?>
    <?php if(in_array($row['ID'], $_SESSION['huydon'])) { echo "<p class='cancel'><span class='title-cancel'>Đơn hàng ".$row['ID']." đã bị hủy</span></p>"; }?>
    <table>
        <tr>
            <th>Ngày lập:</th>
            <td><?= date('d-m-Y',strtotime($row['NgayLap']))?></td>
        </tr>
        <tr>
            <th>Mã đơn hàng:</th>
            <td><?= $row['ID']?></td>
        </tr>
        <tr>
            <th>khách hàng:</th>
            <td><?= $row['TenKhachHang']?></td>
        </tr>
        <tr>
            <th>Tổng tiền:</th>
            <td><?php $tong = number_format($row['TongTien'],0,'.', '.'); echo number_format($row['TongTien'],0,'.', '.')?></td>
        </tr> 
    </table>
    <form action="" method="post">
    <?php if($row['TongTien'] > 0) { ?>
            <?php if($result10[0]['idTrangThai'] == 4 || $result10[0]['idTrangThai'] == 5) { ?>
                <input type="submit" value="Thanh toán" name="button1"></input>
            <?php }?>
            <?php 
                if($result10[0]['idTrangThai'] == 6) {
                    echo '<input type="submit" value="Hoàn trả" name="button2"></input>';
                } 
        ?>
        <?php } ?>
        <?php if(isset($_SESSION['non'])) {
            echo $_SESSION['non'];
        } ?>
    </form>
    <br>
    <?php endforeach;?>
    <a class="btn btn-primary" style="margin-bottom: 10px;"  href="../ChiTietDonHangBan/InDonHang&id=<?=$_GET['id']?>">In đơn hàng</a>
    <?php if(isset($_SESSION['nn'])){ ?>
        <span style="color: green;"><?=$_SESSION['nn']?></span>
    <?php } ?> 
    <table class="table table-condensed table-bordered">
        <tr style="background-color: whitesmoke; color: black; " class="col-6 align-self-center">
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá áp dụng</th>
            <th>Thành tiền</th>
            <th>Action</th>
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
                    <?= $row['SoLuong']?>
                   
                </td>
                <td>
                    <?= number_format($row['DonGiaApDung'],0,'.', '.') ?>
                </td>
                <td>
                    <?= number_format($row['ThanhTien'],0,'.', '.') ?>
                </td>
                <td>
                <?php if ($this->model->TrangThaiChiTiet($_GET['id'])[0]['idTrangThai'] == 6) { ?>
                    <a href="#" style="cursor: default; pointer-events: none; color: gray" disabled>Cập nhật</a> | 
                    <a href="#" style="cursor: default; pointer-events: none; color: gray" disabled onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } else { ?>
                    <a href="../ChiTietDonHangBan/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <a href="../ChiTietDonHangBan/Xoa&id=<?=$row['idDonHangBan']?>&act=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>


<?php
        include("Views/ChiTietDonHangBan/PhanTrang.php");
    ?>
        <?php if(isset($_GET['id'])) {?>
        <a class="return" href="../DonHangBan/DanhSach">Quay lại danh sách đơn hàng bán</a>
        <?php }?>
    
<?php
    include "./Views/Layout/footer.php";
?>