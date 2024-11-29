<?php
session_start();

// Kiểm tra nếu mảng sản phẩm chưa có trong session, khởi tạo mảng sản phẩm
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

// Kiểm tra nếu có GET request với tham số 'index' để chỉnh sửa sản phẩm
if (isset($_GET['index']) && isset($_SESSION['products'][$_GET['index']])) {
    $productIndex = $_GET['index'];
    $product = $_SESSION['products'][$productIndex];
} else {
    header('Location: index.php');
    exit;
}

// Kiểm tra nếu có POST từ form sửa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['price'])) {
    $newProductName = $_POST['name'];
    $newProductPrice = $_POST['price'];

    // Kiểm tra tính hợp lệ của dữ liệu
    if (!empty($newProductName) && !empty($newProductPrice) && is_numeric($newProductPrice)) {
        // Cập nhật sản phẩm trong session
        $_SESSION['products'][$productIndex] = [
            'name' => $newProductName,
            'price' => $newProductPrice
        ];
        // Sau khi cập nhật xong, chuyển hướng về trang index.php
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
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center">Sửa sản phẩm</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="edit_products.php?index=<?= $productIndex ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá thành</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html>

<?php include 'footer.php'; ?>
