<?php
include "./Views/HomeLayout/header.php";
echo "<title>Thông tin tài khoản</title>";
?>
<div class="container rounded mt-4">
    <div class="row">
        <div class="col-md-3 row">
            <div class="col-md-11 bg-light rounded">
                <ul style="list-style: none;" class="lead col-md-12">
                    <br>
                    <a href="../TrangChu/ThongTinTaiKhoan">
                        <li class="row">
                            <div class="col-md-2">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                Trang cá nhân
                            </div>
                        </li>
                    </a><br>
                    <a href="../TrangChu/LichSuMuaHang&id=<?= $_GET['id'] ?>">

                        <li class="row">
                            <div class="col-md-2">
                                <i class="fa fa-history" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                Lịch sử mua hàng
                            </div>
                        </li>
                    </a><br>

                    <a href="#">
                        <li class="row">
                            <div class="col-md-2">
                                <i class="fa fa-gift" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                Ưu đãi của bạn
                            </div>
                        </li>
                    </a><br>

                    <a href="#">
                        <li class="row">
                            <div class="col-md-2">
                                <i class="fa fa-headphones" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                Gọi hỗ trợ viên
                            </div>
                        </li>
                    </a><br>

                    <a href="../TrangChu/DangXuat">
                        <li class="row">
                            <div class="col-md-2">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-10">
                                Thoát tài khoản
                            </div>
                        </li><br>
                    </a><br>

                </ul>
            </div>
        </div>

        <div class="col-md-9 bg-light rounded row">
            <div class="container">
                <div class="btn-group col-md-12 row mx-0 mt-3">
                    <button type="button" class="btn btn-outline-primary col-md-2">Chờ xác nhận</button>
                    <button type="button" class="btn btn-outline-primary col-md-2">Đã xác nhận</button>
                    <button type="button" class="btn btn-outline-primary col-md-2">Đang giao</button>
                    <button type="button" class="btn btn-outline-primary col-md-2">Đã giao</button>
                    <button type="button" class="btn btn-outline-primary col-md-2">Đã hủy</button>
                    <button type="button" class="btn btn-outline-primary col-md-2">Hoàn trả</button>
                </div>
                <div class="mt-4">
                <?php
if (!empty($list)) {
    foreach ($list as $item) {
        extract($item);
        ?>
        <hr>
        <div class="rounded bg-gradient-99CCFF-CCFFFF row">
            <table class="table">
                <tr>
                    <th class="text-bg-danger"><?= date('d-m-Y', strtotime($item['NgayLap'])) ?></th>
                </tr>
                <tr>
                    <td></td>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                foreach ($result as $row) {
                    extract($row);
                    if ($item['ID'] == $row['idDonHangBan']) {
                        ?>
                        <tr>
                            <td>
                                <img src="../Assets/data/HinhAnhSanPham/<?= $row['HinhAnh'] ?>" alt="Hình ảnh sản phẩm" height="70px" width="70px">
                            </td>
                            <td><?= $row['TenSanPham'] ?></td>
                            <td>
                                <?= number_format($row['DonGiaApDung'], 0, '.', '.') ?>
                            </td>
                            <td><?= $row['SoLuong'] ?></td>
                            <td>
                                <?= number_format($row['ThanhTien'], 0, '.', '.') ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr>
                    <th colspan="4">Tổng tiền:</th>
                    <th><?= number_format($item['TongTien'], 0, '.', '.') ?> đ</th>
                </tr>
            </table>
        </div>
        <?php
    }
}
?>

                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    a {
        text-decoration: none;
    }

    .bg-gradient-99CCFF-CCFFFF {
        background: linear-gradient(to right, #99CCFF, #CCFFFF);
    }
</style>