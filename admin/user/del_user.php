<?php
	session_start(); 
    include("../../dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

	$sql = "SELECT * FROM users";
	$query = mysqli_query($conn,$sql);

	if (isset($_GET["id_delete"])) {
		$sql = "DELETE FROM users WHERE user_id = ".$_GET["id_delete"];
		mysqli_query($conn,$sql);
		echo '<script language="javascript">alert("Xóa người dùng thành công!"); window.location="dashboard-fix.php";</script>';
	}
?>