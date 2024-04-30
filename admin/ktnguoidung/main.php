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
    $doanhThuTuan = $dh->laydoanhthutheotuan();

    // Chuẩn bị dữ liệu cho biểu đồ
    $labels = [];
    $data = [];
    foreach ($doanhThuTuan as $tuan) {
        $labels[] = $tuan['Tuan'] . '/' . $tuan['Nam'];
        $data[] = $tuan['TongDoanhThu'];
    }
    $doanhthu_json = json_encode($doanhThuTuan);
    ?>
    <!-- Content Row -->
    <!-- Content Column -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liệt Kê Doanh Thu Tuần</h6>
                </div>
                <div class="card-body ">
                    <div class="chart-bar-container">
                        <canvas id="bieudodoanhthutuan"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .chart-bar-container {
        width: 100%;
        /* Đảm bảo rằng container có kích thước bằng với card-body */
        height: 400px;
        /* Đặt kích thước cố định cho container */
        position: relative;
        /* Thiết lập vị trí tương đối để container có thể chứa canvas */
    }

    #bieudodoanhthutuan {
        width: 100%;
        /* Lấp đầy toàn bộ chiều rộng của container */
        height: 100%;
        /* Lấp đầy toàn bộ chiều cao của container */
    }
</style>
<!-- BIỂU ĐỒ -->
<script>
    // Hàm lấy dữ liệu doanh thu từ PHP và chuyển đổi thành JavaScript
    function layDoanhThuTuan() {
        return <?php echo $doanhthu_json; ?>;
    }

    // Hàm vẽ biểu đồ cột
    function veBieuDoDoanhThu() {
        var doanhThuTuan = layDoanhThuTuan();
        var labels = [];
        var data = [];

        // Duyệt qua dữ liệu và tách ra nhãn và doanh thu
        for (var i = 0; i < doanhThuTuan.length; i++) {
            labels.push('Tuần ' + doanhThuTuan[i].Tuan + '/' + doanhThuTuan[i].Nam); 
            data.push(doanhThuTuan[i].TongDoanhThu);
        }
        // Lấy thẻ canvas để vẽ biểu đồ
        var ctx = document.getElementById('bieudodoanhthutuan').getContext('2d');
        // Tạo biểu đồ cột
        var bieudodoanhthutuan = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Doanh thu theo tuần',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    data: data
                }]
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value)+'đ';
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });
    }
    // Gọi hàm vẽ biểu đồ khi trang được tải
    window.onload = veBieuDoDoanhThu;
</script>
<?php include("../inc/bottom.php") ?>