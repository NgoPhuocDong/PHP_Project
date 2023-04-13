<?php
// include("../../model/database.php");
// include("../../helpers/format.php");
// include("../../controller/productController/classProduct.php");
include("../../controller/index.php");
?>

<p>Thêm danh mục sản phẩm</p>
<?php
    if (isset($insertCat)) {
        echo $insertCat;
    }
?>

<table border="1" width="50%" style="border-collapse: collapse">
    <form action="addProduct.php" method="POST">
        <tr>
            <td>Tên loại sản phẩm</td>
            <td><input type="text" name="tendanhmuc"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
        </tr>
    </form>
</table>
<!-- modules/quanlydanhmucsp/xuli.php -->