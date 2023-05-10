<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
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
<!--
EXAMPLE RETURN CODE
partnerCode=MOMOBKUN20180529
&orderId=1683733321
&requestId=1683733321
&amount=7050000
&orderInfo=1683733321
&orderType=momo_wallet
&transId=2975564894
&payType=napas
&signature=85e0720ca922927f835323f9c23edc6704469d979342bdda1c18f89b80f561ae 
-->

<body>

    <?php
    session_start();
    include("../../dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();



    if (isset($_GET['partnerCode'])) {
        // Lấy data ra từ return của momo
        $partnerCode = $_GET['partnerCode'];
        $orderId = $_GET['orderId'];
        $requestId = $_GET['requestId'];
        $amount = $_GET['amount'];
        $orderInfo = $_GET['orderInfo'];
        $orderType = $_GET['orderType'];
        $transId = $_GET['transId'];
        $payType = $_GET['payType'];
        $signature = $_GET['signature'];

        $sql = "INSERT INTO momo(partnerCode, orderId, requestId, amount, orderInfo, orderType, transId, payType, signature) VALUES ('$partnerCode','$orderId','$requestId','$amount','$orderInfo','$orderType','$transId','$payType','$signature')";
        $result = mysqli_query($conn, $sql);
        // luu vao database
    }


    // Update don hang thanh toan
    // if ($_GET['resultCode'] == '0') {
    //     mysqli_query($conn, "UPDATE checkout SET status = '1' WHERE checkout_id = '{$_SESSION['id_thanhtoan']}';");
    //     echo "  <span style='color:Green; font-weight: bold;'>
    //             Thanh Toán Thành Công
    //         </span>";
    // } else {
    //     echo "<span style='color:red'>Thanh Toán Không Thành Công</span>";
    // }

    ?>
    <div class="container" style="margin-top: 50px;background-color: #f6f7fb;border-radius: 10px;">
        <div class="header clearfix">
            <h3 class="text-muted">MOMO RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['partnerCode'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo $_GET['amount'] / 100 ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['orderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    if ($_GET['resultCode'] == '0') {
                        mysqli_query($conn, "UPDATE checkout SET status = '1' WHERE checkout_id = '{$_SESSION['id_thanhtoan']}';");
                        echo "<span style='color:Green; font-weight: bold;'>Thanh Toán Thành Công</span>";
                    } else {
                        echo "<span style='color:red'>Thanh Toán Không Thành Công</span>";
                    }
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
        echo "You will be redirected to the new page in 5 seconds. If not, click .";
        ?>
        <a href="../../order_info.php"><button class="btn btn-success mb-3">QUAY LẠI</button></a>
    </div>


</body>

</html>