<?php
    // include("dbConnection.php");
    // $dbConnection = new dbConnection();
    // $conn = $dbConnection->getConnection();
    include("header.php");
	$id = -1;
	if (isset($_GET["id"])) {
		$id = intval($_GET['id']);
	}
	// Lấy ra nội dung bài viết theo điều kiện id
	$sql = "select * from posts where posts_id = $id";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>
<style>
    .innertube{
        margin: 50px;
    }
</style>
<main class="innertube">
    <div>
        <?php 
            while ( $data = mysqli_fetch_array($query) ) {
                echo "
                <h3>{$data['title']}</h3> </br>
                <i> Ngày tạo: {$data['createdate']}</i>
                <p>{$data['content']}</p>
                <img src='./assets/img/{$data['image']}' alt=''>
                ";
            }
        ?>
    </div>
</main>
<?php include "footer.php" ?>