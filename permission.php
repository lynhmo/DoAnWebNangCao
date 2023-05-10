<?php
	if (isset($_SESSION['user_id']) == false && isset($_SESSION['admin_id']) == false) {
		// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
		echo '<script language="javascript">alert("Bạn chưa đăng nhập"); window.location="login.php";</script>';
		// header('Location: login.php');
	}else {
		if (isset($_SESSION['permision']) == true) {
			// Ngược lại nếu đã đăng nhập
			$permission = $_SESSION['permision'];
			// Kiểm tra quyền của người đó có phải là admin hay không
			if ($permission == '') {
				// Nếu không phải admin thì xuất thông báo
				echo "Bạn không đủ quyền truy cập vào trang này<br>";
				echo "<a href='index.php'> Click để về lại trang chủ</a>";
				exit();
			}
		}
	}
