<?php include "../header.php" ?>
<div>
    <table class="table table-striped table-bordered border border-2">
        <tr>
            <td class='text-center'>ID</td>
            <td class='text-center'>Tên người nhận</td>
            <td class='text-center'>Địa chỉ</td>
            <td class='text-center'>Điện thoại</td>
            <td class='text-center'>Ngày tạo</td>
            <td class='text-center'>Trạng thái thanh toán</td>
            <td class='text-center'>Tổng tiền</td>
            <td class='text-center'>In</td>
        </tr>
        <?php
        include '../../dbConnection.php';
        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();
        $sql = "SELECT * FROM checkout";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            if($row['status'] == 1){
                $hoadon_status = "Đã thanh toán";
            }else{
                $hoadon_status = "Chưa thanh toán";
            }
            echo "<tr>";
            echo "  <td class='text-center'>" . $row['checkout_id'] . "</td>";
            echo "  <td class='text-center'>" . $row['fullname'] . "</td>";
            echo "  <td class='text-center'>" . $row['address'] . "</td>";
            echo "  <td class='text-center'>" . $row['phone_nb'] . "</td>";
            echo "  <td class='text-center'>" . $row['createdate'] . "</td>";
            echo "  <td class='text-center'>" . $hoadon_status . "</td>";
            echo "  <td class='text-center'>" . $row['total_money'] .  " $</td>";
            echo "  <td class='text-center'>
                                    <a href='#' style=' text-decoration: none;'>In đơn</a>
                                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>