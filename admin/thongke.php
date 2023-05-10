<div class="container">
    <canvas id="myChart"></canvas>
</div>
<script>
    // Lấy context của canvas element
    var ctx = document.getElementById("myChart").getContext("2d");

    // Dữ liệu thể hiện doanh thu theo ngày
    var data = {
        labels: ["Ngày 1", "Ngày 2", "Ngày 3", "Ngày 4", "Ngày 5", "Ngày 6", "Ngày 7", "Chunhat"],
        datasets: [{
            label: "Doanh thu",
            data: [100, 200, 150, 300, 250, 400, 350, 350],
            backgroundColor: "rgba(54, 162, 235, 0.2)",
            borderColor: "rgba(54, 162, 235, 1)",
            borderWidth: 1
        }]
    };

    // Tạo biểu đồ dạng đường
    var myChart = new Chart(ctx, {
        type: "line",
        data: data,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>