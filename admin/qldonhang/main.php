<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH ĐƠN HÀNG</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Mã Loại Sim</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Mã Loại Sim</th>
                            <th>Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($donhang as $dh) : ?>
                            <tr>
                                <td><?php echo $dh["MaDH"]; ?></td>
                                <td><?php echo $dh["MaLS"]; ?></td>
                                <td><?php echo $dh["DonGia"]; ?></td>
                                <td><?php echo $dh["SoLuong"]; ?></td>
                                <td><?php echo $dh["ThanhTien"]; ?></td>
                                <!-- <php if ($dh["TrangThai"] == 1) { ?>
                                    <-- 1- chuẩn bị hàng, 2- đang vận chuyển, 3-hoàn tất đơn hàng, vận chuyển thất bại ->
                                    <td class="text-success">Chuẩn Bị Hàng</td>
                                <php } else { >
                                    <td class="text-danger">Khóa</td>
                                <php }  > -->
                                <!-- cột trạng thái -->
                                <?php if ($dh["TrangThai"] == 0) { ?>
                                    <td class="text-secondary">Chuẩn bị hàng </td>
                                <?php } elseif ($dh["TrangThai"] == 1) { ?>
                                    <td class="text-success">Đang vận chuyển</td>
                                <?php } elseif ($dh["TrangThai"] == 2) { ?><td class="text-success">Hoàn tất đơn hàng</td>
                                <?php } elseif ($dh["TrangThai"] == 3) { ?>
                                    <td class="text-secondary">Đơn đã hủy</td>
                                <?php } ?>

                                <td>
                                    <?php if ($dh["TrangThai"] == 0) { ?>
                                        <div class="row">
                                            <div class="col">
                                                <a href="index.php?action=khoa&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-warning">Xác nhận</a>
                                            </div>
                                            <div class="col">
                                                <a href="index.php?action=huydon&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-secondary">Hủy đơn</a>
                                            </div>
                                        </div>
                                    <?php } elseif ($dh["TrangThai"] == 1) { ?>
                                        <div class="row">
                                            <div class="col">
                                                <a href="index.php?action=khoa&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-warning">Hoàn tất</a>
                                            </div>
                                            <div class="col">
                                                <a href="index.php?action=huydon&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-secondary">Hủy đơn</a>
                                            </div>
                                        </div>
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