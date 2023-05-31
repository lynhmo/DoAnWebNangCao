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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>COD RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 50px;background-color: #f6f7fb;border-radius: 10px;">
        <div class="header clearfix">
            <h3 class="text-muted">COD RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['id'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label>
                    <?php
                    $sql = "SELECT total_money FROM checkout WHERE checkout_id = $id";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $vnd = $row['total_money'] * 23500; // menh gia tien
                    echo  $vnd . " VND";
                    ?>
                </label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    mysqli_query($conn, "UPDATE checkout SET status = '1' WHERE checkout_id = '{$id}';");
                    echo "<span style='color:Green; font-weight: bold;'>Thanh Toán Thành Công</span>";
                    ?>
                </label>
            </div>
        </div>
        <p>
            &nbsp;
        </p>
        <?php
        unset($_SESSION['cart']);
        header("Refresh: 5; URL=../../order_info.php");
        echo "Bạn sẽ được chuyển hướng sau <span id='countdown'></span>. Nếu không hãy bấm  ";
        ?>
        <a href="../../order_info.php"><button class="btn btn-success mb-3">QUAY LẠI</button></a>
    </div>
    <script type="text/javascript">
        var seconds = 5;
        var countdown = setInterval(function() {
            var countdownElement = document.getElementById("countdown");
            countdownElement.innerHTML = seconds + " giây còn lại...";
            seconds--;
        }, 1000);
    </script>
</body>

</html>