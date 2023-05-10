<?php
include("header.php");
// Lấy 8 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
$sql = "select * from posts where is_public = 1 order by createdate desc limit 8";
// Thực hiện truy vấn data thông qua hàm mysqli_query
$query = mysqli_query($conn, $sql);
?>
<style>
    .container_posts {
        margin: 50px;
    }

    .container_posts__add-link {
        text-decoration: none;
        color: white;
        width: 200px;
        height: auto;
        padding: 12px;
        font-size: 24px;
        font-weight: 600;
        text-align: center;
        background-color: #72af5c;
        border-radius: 8px;
    }

    .container_posts__add-link:hover {
        background-color: #397224;
        color: white;
    }

    .container_posts__add {
        margin-top: 40px;
    }
</style>
<main>
    <div class="container_posts">
        <img src="./assets/img/" alt="">
        <div class="w-100">
            <div class="noidung">
                <table class="table table-striped table-bordered border border-2">
                    <tr>
                        <td>Tiêu đề:</td>
                        <td>Nội dung:</td>
                        <td>Hình ảnh:</td>
                        <td>Xem bài viết</td>
                    </tr>
                    <?php
                    // include './dbConnection.php';
                    // $dbConnection = new dbConnection();
                    // $conn = $dbConnection->getConnection();
                    $sql = "SELECT * FROM posts WHERE posts_id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "  <td><h2>" . $row['title'] . "</h2></td>";
                        echo "  <td><p>" . $row['content'] . "</p></td>";
                        echo "  <td><img src='./assets/img/" . $row['image'] . "' height=100></td>";
                        echo "  <td>
                                    <a href='showposts.php?id={$row['posts_id']}'>Xem thêm</a>
                                </td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="container_posts__add">
            <a href="./addposts-ck.php" class="container_posts__add-link">Thêm bài viết</a>
        </div>
    </div>

</main>
<?php include "footer.php" ?>