<?php include("../inc/top.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Doanh Thu Tháng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($tongdt_thanght); ?>vnđ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Doanh Thu Năm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($tongdt_namht); ?>vnđ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Đánh Giá Chưa Phản Hồi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $luotdg; ?>/<?php echo $tong_sldg; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- Content Row -->
    <!-- Content Column -->
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
</div>
<!-- BIỂU ĐỒ -->
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
<?php include("../inc/bottom.php") ?>