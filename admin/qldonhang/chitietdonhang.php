<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">CHI TIẾT ĐƠN HÀNG</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng Chi Tiết</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Sim</th>
                            <th>Đơn Giá</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Đơn Hàng Chi Tiết</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Sim</th>
                            <th>Đơn Giá</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($donhang_ct as $d) :
                            foreach($sim as $s):
                            if($s["MaSim"] == $d["MaS"] && $donhang_ht["MaDH"] == $d["MaDH"]){ ?>
                                    <tr>
                                        <td><?php echo $d["MaDH_CT"]; ?></td>
                                        <td><?php echo $d["MaDH"]; ?></td>
                                        <td><?php echo $s["SoSim"]; ?></td>
                                        <td><?php echo number_format($d["DonGia"]);  ?></td>
                                        <td><?php echo number_format($d["ThanhTien"]); ?></td>
                                        
                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach; ?>
                    </tbody>
                </table>
                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <!-- <input type="reset" value="Hủy" class="btn btn-warning"></input> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>