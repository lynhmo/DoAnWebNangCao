<?php
include("../dbConnection.php");
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();
//lay ra 2 truong du lieu (ngay,tong tien)
$sql = "SELECT DATE(updatedate) AS ngay, SUM(total_money) AS tongtien
            FROM checkout
            GROUP BY ngay
            ORDER BY ngay
            ASC
            LIMIT 30;";
// Thực hiện truy vấn data thông qua hàm mysqli_query
$query = mysqli_query($conn, $sql);
$data = array(array('DATE', 'TOTAL MONEY'));
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = array($row['ngay'], (int) $row['tongtien']);
}

$sql1 = "SELECT SUM(total_money) AS total, DATE_FORMAT(updatedate, '%m-%Y') AS month
FROM checkout
WHERE DATE_FORMAT(updatedate, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m');        
";
$query1 = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_assoc($query1);
?>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(
            <?php echo json_encode($data); ?>
        );

        var options = {
            title: 'Báo Cáo Thống Kê',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>

<style>
    .header__tt{
        width: fit-content;
        margin: 60px auto 20px;
    }
</style>
<div class="header__tt">
    Tổng tiền của tháng <?php echo $data1['month']; ?>: là <?php echo $data1['total']; ?> $

</div>

<div>
    <div id="curve_chart" style="width: 1200px; height: 500px"></div>

</div>