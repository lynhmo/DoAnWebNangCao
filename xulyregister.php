<?php
header('Content-Type: text/html; charset=utf-8');
// Kết nối cơ sở dữ liệu
include("dbConnection.php");
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();

// Dùng isset để kiểm tra Form
if (isset($_POST['dangky'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $name = $_POST["name"];
    $email = $_POST["email"];

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Two password do not match");
    }
    if (empty($email)) {
        array_push($errors, "Two email do not match");
    }

    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM users WHERE username = '$username'";

    // Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="register.php";</script>';
        // Dừng chương trình
        die();
    } else {
        $sql = "INSERT INTO users (username, password, fullname, email) VALUES ('$username','$password','$name','$email')";
        echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="register.php";</script>';

        if (mysqli_query($conn, $sql)) {
            echo "Tên đăng nhập: " . $_POST['username'] . "<br/>";
            echo "Mật khẩu: " . $_POST['password'] . "<br/>";
            echo "Họ tên: " . $_POST['name'] . "<br/>";
            echo "Email: " . $_POST['email'] . "<br/>";
        } else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="register.php";</script>';
        }
    }
}
