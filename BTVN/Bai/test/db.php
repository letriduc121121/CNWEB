<?php
// Kết nối cơ sở dữ liệu với PDO
$host = '127.0.0.1';
$db   = 'test';  // Tên cơ sở dữ liệu của bạn
$user = 'root';  // Tên người dùng MySQL
$pass = '';  // Mật khẩu MySQL
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Kết nối thành công!<br>";
} catch (\PDOException $e) {
    file_put_contents('db_errors.log', $e->getMessage(), FILE_APPEND);
    die("Lỗi kết nối cơ sở dữ liệu. Vui lòng thử lại sau.");
}

// Hàm lấy tất cả sản phẩm
function getAllProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM sanpham");
    return $stmt->fetchAll();
}

// Hàm lấy sản phẩm theo mã
function getProductById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM sanpham WHERE ma_sp = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

// Hàm thêm sản phẩm
function addProduct($ma_sp, $ten_sp, $gia_sp) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO sanpham (ma_sp, ten_sp, gia_sp) VALUES (:ma_sp, :ten_sp, :gia_sp)");
    $stmt->execute(['ma_sp' => $ma_sp, 'ten_sp' => $ten_sp, 'gia_sp' => $gia_sp]);
    echo "Thêm sản phẩm thành công!<br>";
}

// Hàm cập nhật giá sản phẩm
function updateProductPrice($ma_sp, $newPrice) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE sanpham SET gia_sp = :newPrice WHERE ma_sp = :ma_sp");
    $stmt->execute(['newPrice' => $newPrice, 'ma_sp' => $ma_sp]);
    echo "Cập nhật giá sản phẩm thành công!<br>";
}

// Hàm xóa sản phẩm
function deleteProduct($ma_sp) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM sanpham WHERE ma_sp = :ma_sp");
    $stmt->execute(['ma_sp' => $ma_sp]);
    echo "Xóa sản phẩm thành công!<br>";
}

// Gọi các hàm và hiển thị kết quả
echo "<h3>Danh sách tất cả sản phẩm:</h3>";
$products = getAllProducts();
foreach ($products as $product) {
    echo $product['ma_sp'] . " - " . $product['ten_sp'] . " - Giá: " . $product['gia_sp'] . "<br>";
}

// Thêm sản phẩm mới
addProduct('SP011', 'Sản phẩm 11', 600000);

// Cập nhật giá sản phẩm
updateProductPrice('SP001', 120000);

// Xóa sản phẩm
deleteProduct('SP010');
?>
