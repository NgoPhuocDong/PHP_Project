<?php include("./Views/Layout/header.php"); ?>

<style>
  
.container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-control {
    margin-bottom: 20px;
}

.form-control label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-control input {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.btn1 {
    display: block;
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.btn:hover {
    background-color: #2980b9;
}

.label-change{
    text-align: left;
}
</style>

<div class="col-md-12 mt-2">
    <span class="h3 m-2">Profile</span>
    <span>
        <i class="fa fa-angle-double-right" aria-hidden="true" style="font-size: 15px; "></i>
		My Profile
    </span>
    <span style="color: blue;">
        <i class="fa fa-angle-double-right" aria-hidden="true" style="font-size: 15px; "></i>
		Đổi mật khẩu
    </span>

</div>
<hr>

<div class="col-md-12 mt-3">

<div class="container" style="margin-left: 350px; margin-top: 20px;">
        <form action="" method="post">
            <h2>Đổi mật khẩu</h2>
            <div class="form-control">
                <label class="label-change" for="old-password">Mật khẩu hiện tại</label>
                <input type="text" id="old-password" name="old-password" placeholder="Nhập mật khẩu hiện tại" >
            </div>
            <div class="form-control">
                <label class="label-change" for="new-password">Mật khẩu mới</label>
                <input type="text" id="new-password" name="new-password" placeholder="Nhập mật khẩu mới" >
            </div>
            <div class="form-control">
                <label class="label-change" for="confirm-password">Xác nhận mật khẩu mới</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Nhập lại mật khẩu mới">
            </div>
            <?php echo $alert; ?>
            <button type="submit" class="btn1" name="submit">Đổi mật khẩu</button><br>
            <a href="./MyProfile" style="text-align: left;display: block; font-size: 18px; font-weight: bold;">Quay về</a>
        </form>
    </div>
<?php 
    include "./Views/Layout/footer.php";
?>
			
</html>
