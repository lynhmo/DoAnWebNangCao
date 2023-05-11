<?php
include("../dbConnection.php");
$dbConnection = new dbConnection();
$conn = $dbConnection->getConnection();
$sql = "SELECT DATE(updatedate) AS ngay, SUM(total_money) AS tongtien
            FROM checkout
            GROUP BY ngay
            ORDER BY ngay
            ASC
            LIMIT 30;";
// Thực hiện truy vấn data thông qua hàm mysqli_query
$query = mysqli_query($conn, $sql);
$data = array(array('DATE', 'TOTAL_MONEY'));
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = array($row['ngay'], (int) $row['tongtien']);
}
?>
<!-- 
Đoạn back up    
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
    ]);

    var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

    chart.draw(data, options);
    }
</script> -->

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
<div>
    <div id="curve_chart" style="width: 1200px; height: 500px"></div>

</div>