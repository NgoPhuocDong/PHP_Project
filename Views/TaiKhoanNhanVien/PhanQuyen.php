<?php
    include "./Views/Layout/header.php";
    echo "<title>Danh sách quyen nhân viên</title>";
    unset($_SESSION['success']);
    unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân Quyền</title>
    <link rel="stylesheet" type="text/css" href="../Assets/fonts/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/bootstrap.min.css">
	<!-- <script src="../../Assets/scripts/bootstrap.bundle.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.col-md-2 .border-bottom {
    /* margin-left: 28px; */
    margin-left: 10px;
    height: auto;
}
.main-content{
    width: 100%;
    height: 90%;
}

label {
    font-size: 17px;
    margin-left: 3px;
}

.save {
    margin-left: 13px;
    width: 100px;
    height: 40px;
    border-radius: 10px;
    border: none;
    background-color: #5f5ff1;
    color: white;
    margin-left: 90%;
}

.save:hover{
    background-color: #1f1fec;
    transform: scaleX(1.2);
    transition: all .3s ease-in-out;
}

.col {
    margin-top: 5px;
}

input[type="checkbox"] {
    transform: scale(1.5);
}
form {
    text-align: left;
    margin-left: 20px;
}

.content-box {
    width: 100%;
    height: auto;
}

div.container.text-left {
    width: 100%;
    position: relative;
    height: auto;
    text-align: left;
    margin-top: 20px;
    margin-left: 0px;
}

.page {
    text-align: center;
}

.dropdown-toggle::after{
    display: none;
}

</style>
<body>
<div class="main-content">
    <div class="col-md-12 mt-2">
        <span class="h3 m-2">Tài Khoản Nhân Viên</span>
        <span> 
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
           <a class="title-non_active" style="text-decoration: none" href="../TaiKhoanNhanVien/DanhSach">Danh sách</a> 
        </span>
        <span class="title-active">
        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
        Phân quyền
        </span>

    </div>
    <!-- <h2>Phân Quyền Tài Khoản</h2> -->
    <div class="content-box">
        <p>
            <span style="color: red;">
                <?php if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['success']);
                }
                ?>
            </span>
            <span style="color: green;">
                <?php  
                if(isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['error']);
            }?>
            </span>  
        </p>
       
        <form action="./LuuQuyen" method="POST">
            <input class="save" type="submit" value="Lưu quyền" name="Luuquyen">
            <input type="hidden" name="user_id" value="<?= $_GET['id']?>">
            <br>
            <input style="display: inline-block; margin-left: 12px" type="checkbox" name="test[]" value="" id="checkbox-all" onclick="checkboxall()">Chọn tất cả
            <?php 
            if(!empty($result)):
            $i = 0;
            foreach ($result as $row) : extract($row);$i++; ?> 
            <div class="container text-left huhu">
                <h4 style="margin-top: 10px;"><?php echo $row['tenquyen'] ?></h4>
                <div class="row row-cols-4">
                    <?php 
                    if(!empty($result1)):
                    $i = 0;
                    foreach ($result1 as $row1) : extract($row1);$i++; ?> 
                    <?php if($row1['ID_group'] == $row['ID']) { ?>
                        <div class="col">
                            <input onchange="updateSelectAll()" class="hehe" type="checkbox" name="privilege[]" value="<?php echo $row1['ID'] ?>" 
                            <?php if($row1['duongdan'] === '\/Home\/TrangChu') { ?> checked="checked" onclick="this.checked = true"; <?php } ?> 
                            <?php if($row1['duongdan'] === '\/Profile\/MyProfile') { ?>  checked="checked" onclick="this.checked = true";><?php } ?>
                            <?php if($row1['duongdan'] === '\/Profile\/DoiMatKhau') { ?>  checked="checked" onclick="this.checked = true";><?php } ?>  
                            <label for=""><?php echo $row1['ten'] ?></label>
                        </div>
                    <?php } ?> 
                    <?php endforeach; endif; ?>
                </div>
                <?php echo "</br>"; ?>
            </div>  
            <?php endforeach; endif; ?>
            <!-- <div class="container text-center"> -->
        </form>  
    </div>
</div>
</body>
</html>
<?php
    include "./Views/Layout/footer.php";
?>
<?php 
   echo "<script>
   function checkboxall() {
    var mainCheckbox = document.getElementById('checkbox-all');
            var isChecked = mainCheckbox.checked;

            var checkboxes = document.getElementsByClassName('hehe');

            for (var i = 3; i < checkboxes.length; i++) {
                if (checkboxes[i].id !== 'mainCheckbox') {
                    checkboxes[i].checked = isChecked;
                } 
            }
   }
   function updateSelectAll() {
    var selectAllCheckbox = document.getElementById('checkbox-all');
    var checkboxes = document.getElementsByClassName('hehe');
    var allChecked = true;
  
    // Kiểm tra xem tất cả các ô có được chọn hay không
    for (var i = 3; i < checkboxes.length; i++) {
      if (!checkboxes[i].checked) {
        allChecked = false;
        break;
      }
    }
  
    selectAllCheckbox.checked = allChecked;
  }
   </script>"
?>