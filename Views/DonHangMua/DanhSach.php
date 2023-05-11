<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách đơn hàng mua</title>";
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
    <span class="h3 m-2">Đơn hàng nhập</span>
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
                <form class="row">
                    <div class="col-md-8">
                    <input type="text" name="id" class="form-control" placeholder="Nhập mã đơn hàng nhập..." >
                    </div>
                    <div class="col-md-4" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Tìm</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php if(check('../DonHangMua/ThemMoi')) { ?>
                    <a href="../DonHangMua/ThemMoi" class="btn btn-primary">Thêm mới</a>
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
            <th>Mã hóa đơn</th>
            <th>Tên Nguồn Hàng</th>
            <th>Ngày lập</th>
            <th>Tổng tiền</th>
            <th>Người lập phiếu</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
        <?php 
          $i=0;
          if(!empty($result)):
              if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['id'])) {
                  $i = ($current * $item) - $item;
              } 
            foreach ($result as $row) : extract($row);$i++; ?> 
            <tr>
            <td><?= $i ?></td>
                <td><?= $row['ID'] ?></td>
                <td>
                    <?= $row['TenNguonHang'] ?>
                </td>
                <td>
                    <?= date('d-m-Y',strtotime($row['NgayLap'])) ?>
                </td>
                <td>
                    <?= number_format($row['TongTien'],0,'.', '.') ?>
                </td>
                <td>
                    <?= $row['TenNhanVien'] ?>
                </td>
                <td>
                    <?= $row['TenTrangThai'] ?>
                </td>
                <td>
                    <a href="../ChiTietDonHangMua/DanhSach&id=<?=$row['ID']?>">Chi tiết</a> | 
                    <?php if(check('../DonHangMua/CapNhat&id='.$row['ID'])) { ?>
                    <a href="../DonHangMua/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../DonHangMua/Xoa&id='.$row['ID'])) { ?>
                    <a href="../DonHangMua/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
    </table>
</div>
<?php
        include("Views/DonHangMua/PhanTrang.php");
    ?>
        <?php if(isset($_GET['id'])) {?>
        <a class="return" href="../DonHangMua/DanhSach">Quay lại danh sách đơn hàng mua</a>
        <?php }?>
<?php
    include "./Views/Layout/footer.php";
?>