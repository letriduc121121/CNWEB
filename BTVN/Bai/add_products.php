<?php
session_start();

// Kiểm tra nếu mảng sản phẩm chưa có trong session, khởi tạo mảng sản phẩm
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

// Kiểm tra nếu có POST từ form thêm sản phẩm
//$_SERVER['REQUEST_METHOD'] === 'POST': Kiểm tra nếu yêu cầu HTTP được gửi qua phương thức POST (khi người dùng submit form).
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name1']) && isset($_POST['price1'])) {
    $newProductName = $_POST['name1'];
    $newProductPrice = $_POST['price1'];

 
    if (!empty($newProductName) && !empty($newProductPrice) && is_numeric($newProductPrice)) {
        // Thêm sản phẩm mới vào session
        $newProduct = ['name' => $newProductName, 'price' => $newProductPrice];
        $_SESSION['products'][] = $newProduct;
    
        header('Location: index.php');
        exit;
    } else {
        $error = 'Vui lòng nhập tên và giá sản phẩm hợp lệ!';
    }
}
include 'header.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center">Thêm sản phẩm mới</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="add_products.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="nameid" name="name1" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá thành</label>
            <input type="number" class="form-control" id="priceid" name="price1" placeholder="Nhập giá sản phẩm" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>
<?php
include 'footer.php';
?>