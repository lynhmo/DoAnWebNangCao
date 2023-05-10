<?php
session_start();

include("../../dbConnection.php");
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();
$id = -1;
if (isset($_GET["id"])) {
    $id = intval($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOT STORE</title>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    a:hover {
        direction: none;
    }
</style>

<body>

    <div class="container w-25 mt-5 flex-row d-flex justify-content-center" style="align-items: center;justify-content: center; background-color: #f6f7fb;border-radius: 10px;">
        <div class="mx-5">
            <form style="margin-top: 40px;" method="POST" action="checkout_momo.php">
                <div class="form-group mb-3">
                    <label style="font-size: 18px">HỌ VÀ TÊN</label>
                    <input style="font-size: 14px;" type="text" class="form-control w-100" placeholder="Nhập họ tên" name="name_receiver">
                </div>
                <div class="form-group mb-3">
                    <label style="font-size: 18px">ĐỊA CHỈ NHẬN HÀNG</label>
                    <input style="font-size: 14px;" type="text" class="form-control w-100" placeholder="Nhập địa chỉ" name="address_receiver">
                </div>
                <div class="form-group d-flex flex-row mb-3 fs-5 text">
                    <label class="me-3">TỔNG TIỀN</label>
                    <div>
                        <?php
                        $sql = "SELECT total_money FROM checkout WHERE checkout_id = $id";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        echo $row['total_money'] . "$";
                        ?>
                    </div>
                </div>
                <button class="btn btn-success" name="redirect" id="redirect" style="margin-bottom: 10px;">THANH TOÁN</button>
            </form>
            <a href="../../order_info.php"><button style="margin-top: -86px;margin-left: 145px;" class="btn btn-secondary">QUAY LẠI</button></a>
        </div>
    </div>

</body>

</html>