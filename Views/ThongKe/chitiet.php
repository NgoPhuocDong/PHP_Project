<?php
    include "./Views/Layout/header.php";
    echo "<title>Thống kê</title>";
    include("Controllers/KiemTraQuyen.php");
?>
<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<hr style="border: 2px solid black;">
<div class="col-md-12 mt-2 row">
    <span class="h3 m-2 text-center">Thống kê doanh thu</span>
    <hr>
    <div class="card col-ml-25 bg-danger text-white">
        <h4 class="card-item">Sản phẩm</h4>
        <h2><?=$tongsanpham?></h2>
    </div>
   
    <div class="card col-ml-25 bg-warning text-white">
        <h4 class="card-item">Doanh Thu</h4>
        <?php $result = $this->donhangban->DoanhThuDonHangBan(); 
        $result1= $this->donhangmua->DoanhThuDonHangMua();
        ?>
        <h2><?=number_format($result[0]['SUM(TongTien)'],0,'.', '.')  ?></h2>
    </div>
    <div class="card col-ml-25 bg-success text-white">
        <h4 class="card-item">Lợi nhuận</h4>
        <?php $test1 = $this->sanpham->TongTienMuaConLai(); ?>
        <h2><?=$test=number_format($result[0]['SUM(TongTien)'] - $result1[0]['SUM(TongTien)'] + $test1[0]['SL'],0,'.', '.') ; ?></h2>
    </div>
</div>
    <!-- <h2>Đồ thị</h2> -->

<canvas id="myChart" style="margin-top: 20px;width:100%;max-width:600px"></canvas>

<script>
var xValues = [
  <?php foreach($thongkedonhangban as $row) : extract($row) ?>
    <?= date("'d-m-Y'" , strtotime($row['ngay']))."," ?>
    <?php endforeach;?>
];
var yValues = [
  <?php foreach($thongkedonhangban as $row) : extract($row) ?>
    <?= $row['Tong']."," ?>
    <?php endforeach;?>
];
var barColors = ["red", "green","blue","orange","brown","violet"];  

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Thống kê doanh thu"
    }
  }
});
</script>
<hr>

<style>
    .col-ml-25{
        width: 23%;
        margin: 10px;
        height: 100px;
        text-align: center;
    }
</style>
<br>
<hr style="border: 2px solid black;">
<div class="col-md-12 mt-2 row">
   <?php $luottruycap = $this->login->tongluottruycap();
    $nguoitruycap = $this->login->tongnguoitruycap(); ?>
    <span class="h3 m-2 text-center" >Thống kê lượt truy cập</span>
    <hr>
    <div class="card col-ml-25 bg-danger text-white ">
        <h4 class="card-item">Lượt truy cập</h4>
        <h2> <?php echo $luottruycap[0]['tong'] ?></h2>
    </div>
    <div class="card col-ml-25 bg-warning text-white">
        <h4 class="card-item">Người truy cập</h4>
        <h2> <?php echo $nguoitruycap ?></h2>
    </div>  
    <div>
    <select style="width: 20%" name="" id="hidden" onchange="ChangeOptions()">
      <option value="1">Thống kê</option>
      <option value="2">Thống kê theo năm</option>
      <option value="3">Thống kê theo tháng</option>
      <option value="4">Thống kê theo ngày</option>
    </select> 

    <select id="yearSelect" name="year" style="display: none;">
      <option value="">Chọn năm</option>
      <?php $currenYear = date('Y');
        for ($i = 2018; $i <= $currenYear; $i++) { ?>
        <option value=<?php echo $i ?>><?=$i?></option>
      <?php } ?>
    </select>

    <select id="yearSelect1" name="year1" style="display: none;">
      <option value="">Chọn năm</option>
      <?php $currenYear = date('Y');
        for ($i = 2018; $i <= $currenYear; $i++) { ?>
        <option value=<?php echo $i ?>><?=$i?></option>
      <?php } ?>
    </select>

    <select id="monthSelect" name="month" style="display: none;">
      <option value="">Chọn tháng</option>
      <?php $currenYear = date('m');
        for ($i = 1; $i <= 12; $i++) { ?>
        <option value=<?php echo $i ?>><?=$i?></option>
      <?php } ?>
    </select>
  <br>
  </div>
  <div style="margin-top: 10px">
    <span style="width: auto;margin-left: 14%; border-top: 3px solid green; font-weight: 700;">Người truy cập</span>
    <span style="width: auto;margin-left: 15px; border-top: 3px solid red; font-weight: 700;">Lượt truy cập</span>
  </div>
  <br>
  <canvas id="myChart7" style="margin-top: 20px;width:100%;max-width:600px; display: none "></canvas>

  <div id="chartContainer"></div>
  <div id="chartContainer1"></div>
</div>
    <!-- <h2>Đồ thị</h2> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


<canvas id="myChart1" style="margin-top: 20px;width:100%;max-width:600px;"></canvas>

<script>
var xValues = [
  <?php foreach($thongketruycap1 as $row) : extract($row) ?>
    <?= date("'d-m-Y'" , strtotime($row['ngay']))."," ?>
    <?php endforeach;?>
];
var yValues = [
  <?php foreach($thongketruycap1 as $row) : extract($row) ?>
    <?= $row['tongphien']."," ?>
    <?php endforeach;?>
];

var zValues = [
  <?php foreach($thongketruycap1 as $row) : extract($row) ?>
    <?= $row['tongnguoi']."," ?>
    <?php endforeach;?>
];


var barColors = ["red", "green","blue","orange","brown","violet"];  

new Chart("myChart1", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: yValues,
      borderColor: "red",
      fill: false
    }, { 
      data: zValues,
      borderColor: "green",
      fill: false
    }, ]
  },
  options: {
    legend: {display: false}
  }
});
</script>
<hr style="border: 2px solid black;">
   
<script>
var xValues = [
  <?php foreach($thongketruycaptheonam as $row) : extract($row) ?>
    <?= $row['nam']."," ?>
    <?php endforeach;?>
];
var yValues = [
  <?php foreach($thongketruycaptheonam as $row) : extract($row) ?>
    <?= $row['tongphien']."," ?>
    <?php endforeach;?>
];

var zValues = [
  <?php foreach($thongketruycaptheonam as $row) : extract($row) ?>
    <?= $row['tongnguoi']."," ?>
    <?php endforeach;?>
];

new Chart("myChart7", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: yValues,
      borderColor: "red",
      fill: false
    }, 
    { 
      data: zValues,
      borderColor: "green",
      fill: false
    }, 
  ]
  },
  options: {
    legend: {display: false}
  }
});

// <!-- Thống kê đơn hàng -->

</script>
<div class="col-md-12 mt-2 row">
    <span class="h3 m-2 text-center">Thống kê đơn hàng</span>
    <hr>
    <div class="card col-ml-25 bg-danger text-white" style="margin-left: 12%">
        <h4 class="card-item">Đơn hàng bán</h4>
        <h2><?=$tongdonhangban?></h2>
    </div>  
    <div>
    <select style="width: 20%; margin-left: 12%" name="" id="hidden1" onchange="ChangeOptions1()">
      <option value="1">Thống kê</option>
      <option value="2">Thống kê theo năm</option>
      <option value="3">Thống kê theo tháng</option>
      <option value="4">Thống kê theo ngày</option>
    </select> 
  
    <select id="yearSelect2" name="year2" style="display: none;">
      <option value="">Chọn năm</option>
      <?php $currenYear = date('Y');
        for ($i = 2018; $i <= $currenYear; $i++) { ?>
        <option value=<?php echo $i ?>><?=$i?></option>
      <?php } ?>
    </select>

    <select id="yearSelect3" name="year3" style="display: none;">
      <option value="">Chọn năm</option>
      <?php $currenYear = date('Y');
        for ($i = 2018; $i <= $currenYear; $i++) { ?>
        <option value=<?php echo $i ?>><?=$i?></option>
      <?php } ?>
    </select>

    <select id="monthSelect1" name="month1" style="display: none;">
      <option value="">Chọn tháng</option>
      <?php $currenYear = date('m');
        for ($i = 1; $i <= 12; $i++) { ?>
        <option value=<?php echo $i ?>><?=$i?></option>
      <?php } ?>
    </select>
    <div style="margin-top: 10px;">
      <span style="width: auto;margin-left: 11%; border-top: 3px solid green; font-weight: 700">Đơn hàng thành công</span>
      <span style="width: auto;margin-left: 15px; border-top: 3px solid red; font-weight: 700">Đơn hàng hủy</span>
    </div>
    <br>

    <div id="chartContainer2" style="display: none;"></div>
    <div id="chartContainer3" style="display: none;"></div>
    <canvas id="myChart8" style="margin-top: 20px;width:100%;max-width:600px; display: none "></canvas>

</div>

<canvas id="myChart5" style="margin-top: 20px;width:100%;max-width:600px; "></canvas>

<!-- Đồ thị thống kê đơn hàng bán tổng -->
<script>
var xValues = [
  <?php foreach($hangtheongay as $row) : extract($row) ?>
  <?= date("'d-m-Y'" , strtotime($row['NgayLap']))."," ?>
    <?php endforeach;?>
];
var yValues = [
  <?php foreach($tongdonhangbanhuy as $row) : extract($row) ?>
    <?= $row['tongdonhuy']."," ?>
    <?php endforeach;?>
];

var zValues = [
  <?php foreach($tongdonhangbantc as $row) : extract($row) ?>
    <?= $row['tongdontc']."," ?>
    <?php endforeach;?>
];
  new Chart("myChart5", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: yValues,
      borderColor: "red",
      fill: false
    }, 
    { 
      data: zValues,
      borderColor: "green",
      fill: false
    }, 
  ]
  },
  options: {
    legend: {display: false}
  }
});
</script>

<!-- ---------------------------------------- -->

<!-- Đồ thị thống kê đơn hàng bán theo năm -->
<script>
var xValues2 = [
  <?php foreach($tongdonhangbanhuytheonam as $row) : extract($row) ?>
    <?= $row['nam']."," ?>
    <?php endforeach;?>
];
var yValues2 = [
  <?php foreach($tongdonhangbanhuytheonam as $row) : extract($row) ?>
    <?= $row['tongdonhuy']."," ?>
    <?php endforeach;?>
];

var zValues2 = [
  <?php foreach($tongdonhangbantctheonam as $row) : extract($row) ?>
    <?= $row['tongdontc']."," ?>
    <?php endforeach;?>
];

new Chart("myChart8", {
  type: "line",
  data: {
    labels: xValues2,
    datasets: [{ 
      data: yValues2,
      borderColor: "red",
      fill: false
    }, 
    { 
      data: zValues2,
      borderColor: "green",
      fill: false
    }, 
  ]
  },
  options: {
    legend: {display: false}
  }
});

</script>

<!-- ---------------------------- -->


<hr style="border: 2px solid black;">

<!-- Thống kê lượt truy cập -->
<script>
  function ChangeOptions() {
    if (document.getElementById("hidden").value == 1) {
      document.getElementById('myChart1').style.display = 'block';
      document.getElementById('myChart7').style.display = 'none';
      document.getElementById('yearSelect').style.display = 'none';
      document.getElementById('chartContainer').style.display = 'none';
      document.getElementById('yearSelect1').style.display = 'none';
      document.getElementById('monthSelect').style.display = 'none';
      document.getElementById('chartContainer1').style.display = 'none';
    }
 
    if (document.getElementById("hidden").value == 2) {
      document.getElementById('myChart1').style.display = 'none';
      document.getElementById('yearSelect').style.display = 'none';
      document.getElementById('chartContainer').style.display = 'none';
      document.getElementById('yearSelect1').style.display = 'none';
      document.getElementById('monthSelect').style.display = 'none';
      document.getElementById('myChart7').style.display = 'block';
      document.getElementById('chartContainer1').style.display = 'none';
    }

    if (document.getElementById("hidden").value == 3) {
      document.getElementById('myChart1').style.display = 'none'; 
      document.getElementById('yearSelect').style.display = 'inline-block';
      document.getElementById('yearSelect1').style.display = 'none';
      document.getElementById('monthSelect').style.display = 'none';
      document.getElementById('chartContainer').style.display = 'block';
      document.getElementById('chartContainer1').style.display = 'none';
      document.getElementById('myChart7').style.display = 'none';
    }

    if (document.getElementById("hidden").value == 4) {
      document.getElementById('myChart1').style.display = 'none'; 
      document.getElementById('chartContainer').style.display = 'none';
      document.getElementById('chartContainer1').style.display = 'block';
      document.getElementById('yearSelect').style.display = 'none';
      document.getElementById('yearSelect1').style.display = 'inline-block';
      document.getElementById('monthSelect').style.display = 'inline-block';
      document.getElementById('myChart7').style.display = 'none';
    }
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#yearSelect').change(function() {
        var year = $(this).val();
        if (year !== '') {
            // Gửi yêu cầu đến máy chủ PHP để lấy dữ liệu thống kê theo năm
            $.ajax({
                url: '../ThongKe/ajax', // Đường dẫn tới file PHP xử lý
                type: 'POST',
                data: { year: year },
                success: function(response) {
                    // Hiển thị biểu đồ với dữ liệu trả về từ máy chủ
                    $('#chartContainer').html(response);
                } 
            });
        } else {
            $('#chartContainer').html(''); // Xóa biểu đồ khi không có năm được chọn
        }
    });
});
</script>

<script>
$(document).ready(function() {
    // Gửi yêu cầu khi có thay đổi trong các thẻ select
    $('#yearSelect1, #monthSelect').change(function() {
        var selectedYear = $('#yearSelect1').val();
        var selectedMonth = $('#monthSelect').val();
        if (selectedYear !== '' && selectedMonth !== ''   ) {
        // Gửi giá trị năm và tháng đến máy chủ PHP để lấy dữ liệu thống kê
          $.ajax({
              url: '../ThongKe/LuotTruyCapTheoNgay', // Đường dẫn tới file PHP xử lý
              type: 'POST',
              data: { year1: selectedYear, month: selectedMonth },
              success: function(response) {
                  // Hiển thị biểu đồ sử dụng dữ liệu trả về
                  $('#chartContainer1').html(response);
              }
          });
        } else {
          $('#chartContainer').html(''); // Xóa biểu đồ khi không có năm được chọn
        }
    });
});
</script>

<!-- Thống kê đơn hàng bán -->
<script>
  function ChangeOptions1() {
    if (document.getElementById("hidden1").value == 1) {
      document.getElementById('myChart5').style.display = 'block';
      document.getElementById('myChart8').style.display = 'none';
      document.getElementById('yearSelect2').style.display = 'none';
      document.getElementById('chartContainer2').style.display = 'none';
      document.getElementById('yearSelect3').style.display = 'none';
      document.getElementById('monthSelect1').style.display = 'none';
      document.getElementById('chartContainer3').style.display = 'none';
    }
 
    if (document.getElementById("hidden1").value == 2) {
      document.getElementById('myChart5').style.display = 'none'; 
      document.getElementById('chartContainer3').style.display = 'none';
      document.getElementById('chartContainer2').style.display = 'block';
      document.getElementById('yearSelect2').style.display = 'none';
      document.getElementById('yearSelect3').style.display = 'none';
      document.getElementById('monthSelect1').style.display = 'none';
      document.getElementById('myChart8').style.display = 'block';
    }

    if (document.getElementById("hidden1").value == 3) {
      document.getElementById('myChart5').style.display = 'none';
      document.getElementById('yearSelect2').style.display = 'inline-block';
      document.getElementById('chartContainer3').style.display = 'none';
      document.getElementById('yearSelect3').style.display = 'none';
      document.getElementById('monthSelect1').style.display = 'none';
      document.getElementById('myChart8').style.display = 'none';
      document.getElementById('chartContainer2').style.display = 'block';
    }

    if (document.getElementById("hidden1").value == 4) {
      document.getElementById('myChart5').style.display = 'none'; 
      // document.getElementById('yearSelect3').style.display = 'inline-block';
      document.getElementById('yearSelect2').style.display = 'none';
      // document.getElementById('monthSelect1').style.display = 'inline-block';
      document.getElementById('chartContainer3').style.display = 'block';
      document.getElementById('chartContainer2').style.display = 'none';
      document.getElementById('myChart8').style.display = 'none';
      document.getElementById('yearSelect3').style.display = 'inline-block';
      document.getElementById('monthSelect1').style.display = 'inline-block';
    }

  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#yearSelect2').change(function() {
        var year = $(this).val();
        if (year !== '') {
            // Gửi yêu cầu đến máy chủ PHP để lấy dữ liệu thống kê theo năm
            $.ajax({
                url: '../ThongKe/ajax1', // Đường dẫn tới file PHP xử lý
                type: 'POST',
                data: { year: year },
                success: function(response) {
                    // Hiển thị biểu đồ với dữ liệu trả về từ máy chủ
                    $('#chartContainer2').html(response);
                } 
            });
        } else {
            $('#chartContainer2').html(''); // Xóa biểu đồ khi không có năm được chọn
        }
    });
});
</script>

<script>
$(document).ready(function() {
    // Gửi yêu cầu khi có thay đổi trong các thẻ select
    $('#yearSelect3, #monthSelect1').change(function() {
        var selectedYear = $('#yearSelect3').val();
        var selectedMonth = $('#monthSelect1').val();
        if (selectedYear !== '' && selectedMonth !== ''   ) {
        // Gửi giá trị năm và tháng đến máy chủ PHP để lấy dữ liệu thống kê
          $.ajax({
              url: '../ThongKe/DonHangTheoNgay', // Đường dẫn tới file PHP xử lý
              type: 'POST',
              data: { year1: selectedYear, month: selectedMonth },
              success: function(response) {
                  // Hiển thị biểu đồ sử dụng dữ liệu trả về
                  $('#chartContainer3').html(response);
              }
          });
        } else {
          $('#chartContainer3').html(''); // Xóa biểu đồ khi không có năm được chọn
        }
    });
});
</script>




