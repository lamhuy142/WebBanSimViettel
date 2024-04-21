<?php
// Lấy dữ liệu từ cơ sở dữ liệu
$doanhThuThang = $dh->laydoanhthutheothang();

// Chuẩn bị dữ liệu cho biểu đồ
$labels = [];
$data = [];
foreach ($doanhThuThang as $thang) {
    $labels[] = $thang['Thang'] . '/' . $thang['Nam'];
    $data[] = $thang['TongDoanhThu'];
}
$doanhthu_json = json_encode($doanhThuThang);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ Doanh thu theo Tháng</title>
    <!-- Link thư viện Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- <canvas id="myBarChart"></canvas> -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liệt Kê Doanh Thu Tháng</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                    <hr>
                    Styling for the bar chart can be found in the
                    <code>/js/demo/chart-bar-demo.js</code> file.
                </div>
            </div>

        </div>
    </div>

    <script>
        // Hàm lấy dữ liệu doanh thu từ PHP và chuyển đổi thành JavaScript
        function layDoanhThuThang() {
            return <?php echo $doanhthu_json; ?>;
        }

        // Hàm vẽ biểu đồ cột
        function veBieuDoDoanhThu() {
            var doanhThuThang = layDoanhThuThang();
            var labels = [];
            var data = [];

            // Duyệt qua dữ liệu và tách ra nhãn và doanh thu
            for (var i = 0; i < doanhThuThang.length; i++) {
                labels.push(doanhThuThang[i].Thang + '/' + doanhThuThang[i].Nam);
                data.push(doanhThuThang[i].TongDoanhThu);
            }

            // Lấy thẻ canvas để vẽ biểu đồ
            var ctx = document.getElementById('myBarChart').getContext('2d');

            // Tạo biểu đồ cột
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Doanh thu theo tháng',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: data
                    }]
                },
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
        }

        // Gọi hàm vẽ biểu đồ khi trang được tải
        window.onload = veBieuDoDoanhThu;
    </script>
</body>

</html>