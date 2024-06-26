<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH ĐƠN HÀNG</h6>
        </div>
        <div class="card-body">
            <!-- <form action="index.php" method="GET">
                <div class="input-group col-4">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="txtMaDH" id="txtMaDH" class="form-control" placeholder="Nhập Mã Đơn Hàng...">
                    <input type="submit" value="Tìm kiếm" class="btn btn-info"></input>
                </div>
            </form> -->
            <div class="table-responsive">

                <table class="table table-bordered " id="datatable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Ngày Giao Hàng</th>
                            <th>Đã Thanh Toán</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Đơn Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Đặt Hàng</th>
                            <th>Ngày Giao Hàng</th>
                            <th>Đã Thanh Toán</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($donhang as $dh) :
                            foreach ($nguoidung as $nd) :
                                if ($nd["MaND"] == $dh["MaND"]) { ?>
                                    <tr>
                                        <td><?php echo $dh["MaDH"]; ?></td>
                                        <td><?php echo $nd["HoTen"]; ?></td>
                                        <td><?php echo $nd["Sdt"]; ?></td>
                                        <td><?php echo $nd["DiaChi"]; ?></td>
                                        <td><?php echo $dh["NgayDatHang"]; ?></td>
                                        <td><?php echo $dh["NgayGiaoHang"]; ?></td>
                                        <?php if ($dh["TrangThai"] == 2) { ?>
                                            <td class="text-success"><i class="bi bi-check-circle-fill"></i></td>
                                        <?php } else { ?>
                                            <td class="text-danger"><i class="bi bi-x-circle-fill"></i></td>
                                        <?php } ?>
                                        <!-- cột trạng thái -->
                                        <?php if ($dh["TrangThai"] == 0) { ?>
                                            <td class="text-success font-weight-bold">Chuẩn bị hàng </td>
                                        <?php } elseif ($dh["TrangThai"] == 1) { ?>
                                            <td class="text-success font-weight-bold">Đang vận chuyển</td>
                                        <?php } elseif ($dh["TrangThai"] == 2) { ?>
                                            <td class="text-success font-weight-bold">Giao hàng thành công</td>
                                        <?php } elseif ($dh["TrangThai"] == 3) { ?>
                                            <td class="text-danger font-weight-bold">Đơn đã hủy</td>
                                        <?php } ?>

                                        <td>
                                            <?php if ($dh["TrangThai"] == 0) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="index.php?action=xacnhandon&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-warning">Xác nhận</a>
                                                    </div>
                                                </div>
                                            <?php } elseif ($dh["TrangThai"] == 1) { ?>
                                                <div class="row">
                                                </div>
                                            <?php } elseif ($dh["TrangThai"] == 2) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="index.php?action=xemchitiet&id=<?php echo $dh['MaDH']; ?>&MaND=<?php echo $dh['MaND']; ?>" class="btn btn-info">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            <?php } elseif ($dh["TrangThai"] == 3) { ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="index.php?action=xemchitiet&id=<?php echo $dh['MaDH']; ?>&MaND=<?php echo $dh['MaND']; ?>" class="btn btn-info ">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach; ?>
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