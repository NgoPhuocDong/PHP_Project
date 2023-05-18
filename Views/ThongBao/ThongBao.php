  <?php
  include "./Views/Layout/header.php";
  echo "<title>Thông báo</title>";
  ?>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
      }
      h1 {
        text-align: center;
        color: #333;
      }
      table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
      }
      th, td {
        text-align: left;
        padding: 12px;
      }
      th {
        background-color: #f2f2f2;
        color: #333;
      }
      td {
        background-color: #fff;
        color: blue;
      }
      tr:hover {
        background-color: black;
        cursor: pointer;
      }
      .read {
        background-color: #e6e6e6 !important;
      }
      .read td {
        font-weight: normal;
        color: #999;
      }
      .icon {
        display: inline-block;
        height: 25px;
        width: 25px;
        vertical-align: middle;
      }
      .status {
        display: inline-block;
        padding: 5px 8px;
        border-radius: 20px;
        background-color: #f2f2f2;
        color: blue;
        font-weight: bold;
      }
      .status.read {
        background-color: #999;
        color: #fff;
      }
  </style>
  <h1>Thông báo</h1>
  <table>
    <tr>
      <th><img src="/PHP_Project/Assets/data/Hinhanhthongbao/chuong.jpeg" alt="Icon" class="icon"> Thông báo</th>
      <th><img src="/PHP_Project/Assets/data/Hinhanhthongbao/dongho.jpeg" alt="Icon" class="icon"> Thời gian</th>
      <th><img src="/PHP_Project/Assets/data/Hinhanhthongbao/lich.png" alt="Icon" class="icon"> Ngày</th>
      <th><img src="/PHP_Project/Assets/data/Hinhanhthongbao/read.jpg" alt="Icon" class="icon"> Trạng thái</th>
    </tr>
    <tr onclick="markAsRead(this)">
      <td>Thông báo 1</td>
      <td>10:00</td>
      <td>2023-05-14</td>
      <td><span class="status">Chưa đọc</span></td>
    </tr>
    <tr onclick="markAsRead(this)">
      <td>Thông báo 2</td>
      <td>11:30</td>
      <td>2023-05-15</td>
      <td><span class="status">Chưa đọc</span></td>
    </tr>
    <tr onclick="markAsRead(this)">
      <td>Thông báo 2</td>
      <td>11:30</td>
      <td>2023-05-15</td>
      <td><span class="status">Chưa đọc</span></td>
    </tr>
    <tr onclick="markAsRead(this)">
      <td>Thông báo 3</td>
      <td>14:15</td>
      <td>2023-05-16</td>
      <td><span class="status">Chưa đọc</span></td>
    </tr>
  </table>
  <script>
    function markAsRead(row) {
      row.classList.add("read");
      row.cells[3].innerHTML = '<span class="status read">Đã đọc</span>';
    }
  </script>
  <?php
  //Nhận dữ liệu từ ThanhToan
if (isset($tenkhachhang) && isset($thoigian) && isset($ngay)) {
  echo '
  <tr onclick="markAsRead(this)">
    <td>'.$tenkhachhang.'</td>
    <td>'.$thoigian.'</td>
    <td>'.$ngay.'</td>
    <td><span class="status">Chưa đọc</span></td>
  </tr>
  ';
}
?>
</table>

