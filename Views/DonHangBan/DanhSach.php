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
</style>
<div class="col-md-12 mt-2">
    <span class="h3 m-2">Đơn hàng bán</span>
    <span class="title-active">
    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Danh sách
    </span>
</div>
<hr>
<div class="">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <form class="row">
                    <div class="col-md-8">
                    <input type="text" name="id" class="form-control" placeholder="Nhập mã đơn hàng" >
                    </div>
                    <div class="col-md-2" style="padding:0;margin-left:-7px;">
                        <button class="btn btn-primary">Tìm</button>
                    </div>
                    <div class="col-md-2" style="padding:0;margin-left:-7px;">
                   
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <div style="float: right;">
                    <button class="btn btn-danger">Import</button>
                    <button class="btn btn-success">Export</button>
                    <?php if(check('../DonHangBan/ThemMoi')) { ?>
                    <a href="../DonHangBan/ThemMoi" class="btn btn-primary">Thêm mới</a>
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
            <th>Tên Khách hàng</th>
            <th>Ngày lập</th>
            <th>Tổng tiền</th>
            <th>Người lập phiếu</th>
            <th>Trạng thái</th>
            <th>Action</th>
        </tr>
        <?php 
        $i = 0;
        if(!empty($result)):
            if (isset($_GET['page']) && $_GET['page'] == $current || isset($_GET['id'])) {
                $i = ($current * $item) - $item;
            } 
            $tong = 0;
            foreach ($result as $row) : extract($row);$i++; ?> 
             <?php if($row['TongTien'] == 0 && $row['idTrangThai'] == 4) { ?>
            <tr style="color: white; background: red;">
                <td><?= $i;
                $tong += $i;
                $_SESSION['soluongdonhang'] = $tong; ?></td>
                <td><?= $row['ID'] ?></td>
                <td>
                    <?= $row['TenKhachHang'] ?>
                </td>
                <td>
                <?= date('d-m-Y',strtotime($row['NgayLap']))?>
                </td>
                
                <td>
                    <?= $row['TongTien'] ?>
                </td>
                <td>
                    <?= $row['TenNhanVien'] ?>
                </td>
                <td><?=$row['TenTrangThai']?></td>
                <td>
                    <a href="../ChiTietDonHangBan/DanhSach&id=<?=$row['ID']?>">Chi tiết</a> | 
                    <?php if(check('../DonHangBan/CapNhat&id='.$row['ID'])) { ?>
                    <a href="../DonHangBan/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../DonHangBan/Xoa&id='.$row['ID'])) { ?>
                    <a href="../DonHangBan/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td><?= $i;
                $tong += $i;
                $_SESSION['soluongdonhang'] = $tong; ?></td>
                <td><?= $row['ID'] ?></td>
                <td>
                    <?= $row['TenKhachHang'] ?>
                </td>
                <td>
                <?= date('d-m-Y',strtotime($row['NgayLap']))?>
                </td>
                
                <td>
                    <?= $row['TongTien'] ?>
                </td>
                <td>
                    <?= $row['TenNhanVien'] ?>
                </td>
                <td style="color: green; font-weight: bold;">
                    <?=$row['TenTrangThai']?>
                </td>
                <td>
                    <a href="../ChiTietDonHangBan/DanhSach&id=<?=$row['ID']?>">Chi tiết</a> | 
                    <?php if(check('../DonHangBan/CapNhat&id='.$row['ID'])) { ?>
                    <a href="../DonHangBan/CapNhat&id=<?=$row['ID']?>">Cập nhật</a> | 
                    <?php } ?>

                    <?php if(check('../DonHangBan/Xoa&id='.$row['ID'])) { ?>
                    <a href="../DonHangBan/Xoa&id=<?=$row['ID']?>" onclick="return confirm('Xác nhận xóa !');">Xóa</a>
                    <?php } ?>
                </td>
                <?php } ?>
            </tr>
            <?php endforeach; endif; ?>
          
            
    </table>
</div>
<?php
        include("Views/DonHangBan/PhanTrang.php");
    ?>
        <?php if(isset($_GET['id'])) {?>
        <a class="return" href="../DonHangBan/DanhSach">Quay lại danh sách đơn hàng bán</a>
        <?php }?>
    

<?php
    include "./Views/Layout/footer.php";
?>