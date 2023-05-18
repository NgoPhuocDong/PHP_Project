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
                    
                    <?php foreach ($thongtin as $item) { ?>
                    <a href="../TrangChu/LichSuMuaHang&id=<?=$item['IDKhachHang']?>"><?php }?>
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
        <?php foreach ($thongtin as $row) { ?>
        <div class="col-md-9 bg-light rounded row">
            <div class="card col-md-3 bg-warning">
                    <div style="height:200px;width:200px" class="imgAvt rounded-circle mt-4 mx-auto">
                        <!-- <img class="rounded-circle" src="https://vapa.vn/wp-content/uploads/2022/12/anh-3d-thien-nhien.jpeg" style="width:100%;height:100%"> -->
                        <img class="rounded-circle" src="../Assets/data/AvatarKhachHang/<?= $row['AnhDaiDien'] ?>" style="width:100%;height:100%">
                    </div>
                    <br>

                    <form method="post" enctype="multipart/form-data" class="mx-auto">
                        <input type="text" class="btn-check" name="id" value="<?= $row['IDKhachHang']?>"/>
                        <div class="btn btn-primary mx-auto">
                            <label class="text-white" for="customFile">Đổi ảnh đại diện</label>
                            <input type="file" class="form-control d-none" id="customFile" name="hinhanh" onchange="handleFileChange()"/>
                        </div>
                        <button type="submit" id="submitButton" style="display: none;" name="upload">Submit</button>
                    </form>

                    <br>

                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" placeholder="<?= $row['TenDangNhap']?>" disabled="disabled">
                    <br>

                    <label class="form-label">Mã khách hàng</label>
                    <input type="text" class="form-control" placeholder="<?= $row['IDKhachHang']?>" disabled="disabled">
                    <br>
                    
                    <a href="#" class="btn btn-primary mx-auto mb-4">Đổi mật khẩu</a>
            </div>
            <div class="col-md-9 ">
                <form method="post" class="form-control" enctype="multipart/form-data" >
                    <input type="text" class=" btn-check" name="id" value="<?= $row['ID']?>">

                    <div class="">
                        <label class="form-label  mt-4">Tên khách hàng</label>
                        <input type="text" class="form-control" name="tenkhachhang" value="<?= $row['TenKhachHang']?>">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Giới tính</label>
                            <select class="form-control" name="gioitinh">
                                <option value="<?= $row['GioiTinh']?>" class="text-white"><?= $row['GioiTinh']?></option>
                                <hr>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" name="ngaysinh" value="<?= $row['NgaySinh']?>">
                        </div>
                    </div>
                    <br>
                    <div>
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="sodienthoai" value="<?= $row['SoDienThoai']?>">
                    </div>
                    <br>
                    <div>
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" value="<?= $row['DiaChi']?>">
                    </div> 
                    <br>                   
                    <div>
                        <label class="form-label">Email</label>
                        <input type="gmail" class="form-control" name="email" value="<?= $row['Email']?>">
                    </div>
                    <br>
                    <div class="col-md-3 mx-auto">
                        <input type="submit" value="Cập nhật thông tin" name="update" class="btn btn-primary mx-auto mb-4 form-control">
                    </div>
                </form>
            <?php }?>
            </div>
        </div>
    </div>
</div>

<style>
    a{
        text-decoration: none;
    }
    .imgAvt{
        background-image: url('../Assets/AvatarNhanVien/NhanVienMacDinh.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<script>
    function handleFileChange() {
        var confirmed = confirm("Xác nhận cập nhật ảnh đại diện");
        if (confirmed) {
            // Nếu người dùng nhấn OK trong hộp thoại xác nhận
            // Kích hoạt nút "Submit"
            var submitButton = document.getElementById("submitButton");
            submitButton.click();
        } else {
            // Nếu người dùng nhấn Cancel trong hộp thoại xác nhận
            alert("Update failed");
        }
    }
</script>









