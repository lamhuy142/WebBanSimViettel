<?php include("../inc/top.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $luotdg; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <!-- Content Column -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu theo tháng</h6>
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
            <script>
                var doanhthuData = <?php echo $doanhthu_json; ?>; // Dữ liệu doanh thu từ PHP

                // Tạo mảng chứa các tháng và doanh thu tương ứng
                var labels = [];
                var data = [];
                doanhthuData.forEach(function(item) {
                    // Chuyển đổi tháng thành tiếng Việt
                    var thangNam = 'Tháng ' + item.Thang + '/' + item.Nam;
                    labels.push(thangNam);

                    // Chuyển đổi đơn vị tiền tệ thành VND
                    var doanhThuVND = parseFloat(item.TongDoanhThu).toLocaleString('vi', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    data.push(doanhThuVND);
                });

                // Vẽ biểu đồ bằng Chart.js
                var ctx = document.getElementById('myAreaChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Doanh thu',
                            data: data,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                // Định dạng hiển thị của trục y là số tiền VND
                                ticks: {
                                    callback: function(value, index, values) {
                                        return value;
                                    }
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->
<?php include("../inc/bottom.php") ?>