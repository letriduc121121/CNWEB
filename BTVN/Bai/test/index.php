<?php
// Kết nối với file db.php
include 'db.php';

// Thực hiện các thao tác thêm, sửa, xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_product'])) {
        // Thêm sản phẩm
        $ma_sp = $_POST['ma_sp'];
        $ten_sp = $_POST['ten_sp'];
        $gia_sp = $_POST['gia_sp'];
        addProduct($ma_sp, $ten_sp, $gia_sp);
    }

    if (isset($_POST['update_product'])) {
        // Cập nhật giá sản phẩm
        $ma_sp = $_POST['ma_sp'];
        $newPrice = $_POST['gia_sp'];
        updateProductPrice($ma_sp, $newPrice);
    }

    if (isset($_POST['delete_product'])) {
        // Xóa sản phẩm
        $ma_sp = $_POST['ma_sp'];
        deleteProduct($ma_sp);
    }
}

// Lấy danh sách sản phẩm
$products = getAllProducts();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional: Style file -->
</head>
<body>

    <h1>Quản lý Sản phẩm</h1>

    <!-- Form thêm sản phẩm -->
    <h2>Thêm Sản phẩm</h2>
    <form method="POST" action="">
        <label for="ma_sp">Mã sản phẩm:</label>
        <input type="text" name="ma_sp" id="ma_sp" required><br><br>
        
        <label for="ten_sp">Tên sản phẩm:</label>
        <input type="text" name="ten_sp" id="ten_sp" required><br><br>

        <label for="gia_sp">Giá sản phẩm:</label>
        <input type="number" name="gia_sp" id="gia_sp" required><br><br>

        <button type="submit" name="add_product">Thêm Sản phẩm</button>
    </form>

    <!-- Form cập nhật giá sản phẩm -->
    <h2>Cập nhật Giá Sản phẩm</h2>
    <form method="POST" action="">
        <label for="ma_sp">Mã sản phẩm:</label>
        <input type="text" name="ma_sp" id="ma_sp" required><br><br>

        <label for="gia_sp">Giá mới:</label>
        <input type="number" name="gia_sp" id="gia_sp" required><br><br>

        <button type="submit" name="update_product">Cập nhật giá</button>
    </form>

    <!-- Form xóa sản phẩm -->
    <h2>Xóa Sản phẩm</h2>
    <form method="POST" action="">
        <label for="ma_sp">Mã sản phẩm:</label>
        <input type="text" name="ma_sp" id="ma_sp" required><br><br>

        <button type="submit" name="delete_product">Xóa Sản phẩm</button>
    </form>

    <!-- Danh sách sản phẩm -->
    <h2>Danh sách Sản phẩm</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['ma_sp']; ?></td>
                    <td><?php echo $product['ten_sp']; ?></td>
                    <td><?php echo number_format($product['gia_sp'], 2); ?> VNĐ</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
