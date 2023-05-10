<?php include("./header.php") ?>

<body class="container__body">
    <div class="container__profile">
        <div class="container__title">
            <div class="container__title__item">
                <a href="" class="container__profile__title">Bài viết của bạn</a>
            </div>
            <div class="container__title__item">
                <a href="./order_info.php" class="container__profile__title">Giỏ hàng của bạn</a>
            </div>
        </div>
        <table class='table table-hover table__profile'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Image</th>
                    <th scope='col'>CreateDate</th>
                    <th scope='col'>Content</th>
                    <th scope='col'>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from posts where user_id = '{$_SESSION['user_id']}'";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "
                    <tr>
                        <th scope='row'>{$data['posts_id']}</th>
                        <td>{$data['title']}</td>
                        <td><img src='./assets/img/{$data['image']}' alt=''style='width: 50px; height:auto'></td>
                        <td>{$data['createdate']}</td>
                        <td>" . substr($data['content'], 0, 100) . "</td>
                        <td>
                            <a href='showposts.php?id={$data['posts_id']}' class='option__posts'><i class='fa-solid fa-eye'></i></a>
                            <a href='fixposts.php?id={$data['posts_id']}' class='option__posts'><i class='fa-solid fa-pen-to-square'></i></a>
                            <a href='deleteposts.php?id={$data['posts_id']}' class='option__posts'><i class='fa-solid fa-trash'></i> </a>
                        </td>
                    </tr>  
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php include("./footer.php") ?>