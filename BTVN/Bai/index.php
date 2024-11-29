<?php
session_start();
//unset($_SESSION['products']);
// Kiểm tra nếu mảng sản phẩm chưa có trong session, khởi tạo mảng sản phẩm
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['name' => 'Sản phẩm 1', 'price' => '1000'],
        ['name' => 'Sản phẩm 2', 'price' => '2000'],
        ['name' => 'Sản phẩm 3', 'price' => '3000']
    ];
}

// Kiểm tra nếu có POST từ form xóa sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_index'])) {
    $deleteIndex = $_POST['delete_index'];

    // Kiểm tra chỉ số hợp lệ và xóa sản phẩm
    if (isset($_SESSION['products'][$deleteIndex])) {
        unset($_SESSION['products'][$deleteIndex]); // Xóa sản phẩm khỏi session
        $_SESSION['products'] = array_values($_SESSION['products']); // Cập nhật lại mảng, tránh chỉ số trống
    }
}



include 'header.php';
?>


<div class="container">
    <h2 class="text-center my-4">Danh Sách Sản Phẩm</h2>
    <button type="button" class="btn btn-success mb-3">
        <a href="add_products.php" class="text-white text-decoration-none">Thêm mới</a>
    </button>
    <form action="index.php" method="POST">
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['products'] as $index => $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= number_format($product['price']) ?> VND</td>
                        <!-- Chuyển hướng đến trang sửa với tham số index -->
                        <td><a href="edit_products.php?index=<?= $index ?>" class="btn btn-warning btn-sm">Sửa</a></td>
                        
                        <td>
                            <button type="submit" name="delete_index" value="<?= $index ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                <i class="ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>



<?php include 'footer.php'; ?>
