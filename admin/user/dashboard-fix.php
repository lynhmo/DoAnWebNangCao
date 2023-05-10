<?php
include("../../dbConnection.php");
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();
?>
<?php include "../header.php" ?>

<div class="container">
    <div class="page-header">
        <h2 class="pull-left">Người dùng</h2>
        <a href="adduser.php" class="btn btn-success pull-right">Thêm người dùng</a>
    </div>
    <?php
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);
    ?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Password</td>
                <td>Fullname</td>
                <td>Email</td>
                <td>Is_Block</td>
                <td>Permision</td>
                <td>Option</td>
            <tr>
        </thead>
        <tbody>
            <?php
            while ($data = mysqli_fetch_array($query)) {
                $i = 1;
                $id = $data['user_id'];
            ?>
                <tr>
                    <!-- <td><?php echo $i; ?></td> -->
                    <td><?php echo $data['user_id']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['fullname']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo ($data['is_block'] == 1) ? "Bị khóa" : "Không bị khóa"; ?></td>
                    <td><?php echo ($data['permision'] == 0) ? "Thành viên thường" : "Admin"; ?></td>
                    <td>
                        <a href="fix_user.php?id=<?php echo $id; ?>"><i class='fa-solid fa-wrench icon_option'></i></a>
                        <a href="del_user.php?id_delete=<?php echo $id; ?>"><i class='fa-solid fa-trash icon_option'></i></a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
</body>