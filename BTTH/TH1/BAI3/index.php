<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accounts_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/icon/themify-icons.css">
    
    <style>
    .bg-light {
      background-image: linear-gradient(120deg, #1d4a69 0%, #90f99e 100%);
    }
    </style>
</head>

<body>

    <div class="container mt-5">
        <header class="bg-light p-3 mb-4">
            <nav class="nav d-flex justify-content-center">
                <a class="nav-link fs-1 fw-bold text-center" style=" color:white;" href="#"> DANH SÁCH SINH VIÊN</a>
            </nav>
        </header>

        <?php
        if ($result->num_rows > 0) {
            echo "<table class='table table-bordered table-striped'>
                <thead class='thead-success'>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>City</th>
                        <th>Email</th>
                        <th>Course ID</th>
                    </tr>
                </thead>
                <tbody>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["firstname"] . "</td>
                    <td>" . $row["lastname"] . "</td>
                    <td>" . $row["city"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["course_id"] . "</td>
                  </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-warning'>Không có dữ liệu!</div>";
        }

        $conn->close();
        ?>

    </div>
</body>

</html>