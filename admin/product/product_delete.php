<?php
    session_start();
    include "../../permission.php";
    include '../../dbConnection.php';
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    $id = -1;
    if (isset($_GET["id"])) {
        $id = intval($_GET['id']);
    }

    $sql = "DELETE FROM products WHERE product_id = $id";
    $query = mysqli_query($conn, $sql);
    echo '<script language="javascript">alert("Xóa sản phẩm thành công!"); window.location="addProducts.php";</script>';
?>