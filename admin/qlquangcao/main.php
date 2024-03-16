<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH QUẢNG CÁO</h6>
        </div>
        <div class="card-body">
            <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themqc">Thêm</a></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Quảng Cao</th>
                            <th>Mô Tả</th>
                            <th>Hình Ảnh</th>
                            <th>Đường Dẫn</th>
                            <th>Trạng Thái</th>
                            <th>Khóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Quảng Cao</th>
                            <th>Mô Tả</th>
                            <th>Hình Ảnh</th>
                            <th>Đường Dẫn</th>
                            <th>Trạng Thái</th>
                            <th>Khóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($quangcao as $qc) : ?>
                                    <tr>
                                        <td><?php echo $qc["MaQC"]; ?></td>
                                        <td><?php echo $qc["MoTa"]; ?></td>
                                        <td><img width="50px" src="../../img/user/<?php echo $qc["HinhAnh"]; ?>" alt="<?php echo $qc["HinhAnh"]; ?>"></td>
                                        <td><?php echo $qc["Url"]; ?></td>
                                        <?php if ($qc["TrangThai"] == 1) { ?>
                                            <td class="text-success">Bật</td>
                                        <?php } else { ?>
                                            <td class="text-primary">Tắt</td>
                                        <?php } ?>
                                        <td>
                                            <?php if ($qc["TrangThai"] == 1) { ?>
                                                <a href="index.php?action=khoa&id=<?php echo $qc['MaQC']; ?>&TrangThai=<?php echo $qc['TrangThai']; ?>" class="btn btn-danger">Khóa</a>
                                            <?php } else {
                                            ?>
                                                <a href="index.php?action=khoa&id=<?php echo $qc['MaQC']; ?>&TrangThai=<?php echo $qc['TrangThai']; ?>" class="btn btn-warning">Mở</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>