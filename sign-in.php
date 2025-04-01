<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
</head>
<body>
    <h2>Form Đăng Ký</h2>
    <form action="process_signup.php" method="POST">
        <label for="name">Họ và Tên:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>
<?php
$servername = "localhost";
$username = "root"; 
$password = "";      
$dbname = "user_db";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Mã hóa mật khẩu


$check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
$check_email->bind_param("s", $email);
$check_email->execute();
$result = $check_email->get_result();

if ($result->num_rows > 0) {
    echo "Email đã được sử dụng!";
} else {

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    
    if ($stmt->execute()) {
        echo "Đăng ký thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }
}

$conn->close();
?>
