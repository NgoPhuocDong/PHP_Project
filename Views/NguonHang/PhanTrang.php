<style>
.paging-link {
  border: 1px solid black; /* tạo viền đen bao quanh thẻ a */
  padding:3px 15px; /* thêm khoảng cách giữa nội dung và viền */
  display: inline-block; /* chuyển thẻ a thành khối để có thể sử dụng thuộc tính width và height */
  /* width: 100px; đặt chiều rộng cho thẻ a */
  /* height: 50px; đặt chiều cao cho thẻ a */
  text-align: center; /* căn giữa nội dung của thẻ a */
  text-decoration: none; /* loại bỏ gạch chân mặc định */
  color: black; /* đặt màu chữ cho thẻ a */
  border-radius: 5px;
  margin-left: 8px;
}

.paging-link-select{
    border: 1px solid black; /* tạo viền đen bao quanh thẻ a */
  padding:3px 15px; /* thêm khoảng cách giữa nội dung và viền */
  display: inline-block; /* chuyển thẻ a thành khối để có thể sử dụng thuộc tính width và height */
  /* width: 100px; đặt chiều rộng cho thẻ a */
  /* height: 50px; đặt chiều cao cho thẻ a */
  text-align: center; /* căn giữa nội dung của thẻ a */
  text-decoration: none; /* loại bỏ gạch chân mặc định */
  color: black; /* đặt màu chữ cho thẻ a */
  border-radius: 5px;
  margin-left: 8px;
  background: black;
  color: white;
}

.paging-link:hover{
    background: #232121;
    color: white;
    transition: all .2s ease-in-out;
}

.container{
    width: 100%;
    /* position: absolute; */
    text-align: center;
    margin: 40px 0 0 -65px;
}

.paging-link-first {
    margin-right: 50px;
}

.paging-link-last {
    margin-left: 50px;
}
</style>
<div class="container">
<?php 
        if($current > 3) { 
        $first = 1; 
    ?>
    <a class="paging-link paging-link-first " href="?id=<?=$_GET['id']?>&per_page=<?=$item?>&page1=<?=$first?>">First</a>
    <?php }
    if($current > 1) {
        $prev = $current - 1; ?>
    <a class="paging-link" href="?id=<?=$_GET['id']?>&per_page=<?=$item?>&page=<?=$prev?>">Prev</a>
<?php } ?>

<?php
    for($num=1; $num<=$totalPage;$num++) { ?>
    <?php 
        if($num != $current) { ?>
    <?php 
        if($num > $current - 3 && $num < $current + 3) { ?>
    <a class="paging-link" href="?id=<?=$_GET['id']?>&per_page=<?=$item?>&page=<?=$num?>"><?=$num?></a>
    <?php } ?>
    <?php } else { ?>
    <strong class="paging-link-select"><?=$num?></strong>
    <?php } ?>
<?php } ?>

<?php 
        if($current < $totalPage - 1) {
        $next = $current + 1;
    ?>
        <a class="paging-link" href="?id=<?=$_GET['id']?>&per_page=<?=$item?>&page=<?=$next?>">Next</a>
    <?php } 
    if($current < $totalPage - 3) {
        $end = $totalPage; ?>
        <a class="paging-link paging-link-last" href="?id=<?=$_GET['id']?>&per_page=<?=$item?>&page=<?=$end?>">Last</a>
<?php } ?>
</div>


