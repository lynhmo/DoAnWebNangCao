<?php
    include("../../dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    session_start(); 
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$name = $_POST["fullname"];
		$email = $_POST["email"];
		$permission = $_POST["permission"];
		$is_block = 0;
		if (isset($_POST["is_block"])) {
			$is_block = $_POST["is_block"];
		}

		$id = $_POST["id"];
		// Viết câu lệnh cập nhật thông tin người dùng
		$sql = "UPDATE users SET fullname = '$name', email = '$email', permision = '$permission', is_block = '$is_block' WHERE user_id=$id";
        $sql_query= mysqli_query($conn,$sql);
		// thực thi câu $sql với biến conn lấy từ file connection.php
		echo '<script language="javascript">alert("Sửa thông tin thành viên thành công!"); window.location="dashboard-fix.php";</script>';
		// header('Location: dashboard-fix.php');
	}

	$id = -1;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$sql = "SELECT * FROM users WHERE user_id = ".$id;
	$query = mysqli_query($conn,$sql);

	function make_permission_dropdown($id){
		$select_1 = "";
		$select_2 = "";
		$select_3 = "";
		if ($id == 0) {
			$select_1 = 'selected = "selected"';
		}
		if ($id == 1) {
			$select_2 = 'selected = "selected"';
		}
		if ($id == 2) {
			$select_3 = 'selected = "selected"';
		}
		$select = '<select id="permission" name="permission">
						<option value="-1"></option>
						<option value="0" '.$select_1.'>Thành viên thường</option>
						<option value="1" '.$select_2.'>Admin cấp 1</option>
						<option value="2" '.$select_3.'>Admin cấp 2</option>
					</select>';

		return $select;
	}


?>
<?php include "../header.php" ?>

    <div>
        <?php
		while ( $data = mysqli_fetch_array($query) ) {
			$i = 1;
			$id = $data['user_id'];
			$is_block = "";
			if ($data['is_block'] == 1) {
				$is_block = "checked='checked'";
			}
	    ?>
        <form method="POST" action="fix_user.php">
            <h3 class="title__fixuser">Chỉnh sửa thông tin thành viên</h3>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <table class="table">
                <thead>
                    <tr>
                        <td class="user__new__title">Fullname</td>
                        <td class="user__new__title">Email</td>
                        <td class="user__new__title">Is_Block</td>
                        <td class="user__new__title">Permision</td>
                    <tr>
                </thead>
                <tbody>
                    <tr>
                        <td  class="user__new__title">
                            <input type="text" class="user__new" name="fullname" id="fullname" value="<?php echo $data['fullname']; ?>">
                        </td>
                        <td  class="user__new__title">
                            <input type="text" class="user__new" name="email" id="email" value="<?php echo $data['email']; ?>">
                        </td>
                        <td  class="user__new__title">
                            <input type="checkbox" class="user__new" name="is_block"  value="1" <?php echo $is_block; ?>>
                        </td>
                        <td  class="user__new__title">
					        <?php echo make_permission_dropdown($data['permision']); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn__add__user" name="btn_submit">Hoàn Tất</button>
            </div>
		</form>
        <?php }
        ?>
    </div>
