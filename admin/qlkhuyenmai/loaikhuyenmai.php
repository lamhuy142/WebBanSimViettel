<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">LOẠI KHUYẾN MÃI</h6>
        </div>
        <div class="card-body">
            <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themloaikm">Thêm</a></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Loại Khuyến Mãi</th>
                            <th>Đơn Vị</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên Loại Khuyến Mãi</th>
                            <th>Đơn Vị</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($loai as $l) :
                            if (isset($id) && $l["MaLKM"] == $id) { ?>
                                <tr>
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xulysualoaikm">
                                        <input type="hidden" name="MaLKM" value="<?php echo $l['MaLKM'] ?>">
                                        <input type="hidden" name="trangthai" value="<?php echo $l['TrangThai'] ?>">
                                        <td>
                                            <input required class="form-control" type="text" name="txtten" value="<?php echo $l['TenLKM'] ?>">
                                        </td>
                                        <td>
                                            <input required class="form-control" type="text" name="txtdonvi" value="<?php echo $l['DonViKM'] ?>">
                                        </td>
                                        <!-- Trạng Thái của chương trình khuyến mãi -->
                                        <?php if ($l["TrangThai"] == 1) { ?>
                                            <td class="text-success">Hoạt Động</td>
                                            <td>
                                                <input type="submit" value="Lưu" class="btn btn-success"></input>
                                                <a href="index.php?action=khoaloaikm&id=<?php echo $l['MaLKM']; ?>&TrangThai=<?php echo $l['TrangThai'] ?>" class="btn btn-danger">Khóa</a>
                                            </td>
                                        <?php } else { ?>
                                            <td class="text-danger">Dừng</td>
                                            <td>
                                                <input type="submit" value="Lưu" class="btn btn-success"></input>
                                                <a href="index.php?action=khoaloaikm&id=<?php echo $l['MaLKM']; ?>&TrangThai=<?php echo $l['TrangThai'] ?>" class="btn btn-primary">Mở</a>
                                            </td>
                                        <?php } ?>
                                    </form>

                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td><?php echo $l["TenLKM"]; ?></td>
                                    <td><?php echo $l["DonViKM"]; ?></td>
                                    <!-- Trạng Thái của chương trình khuyến mãi -->
                                    <?php if ($l["TrangThai"] == 1) { ?>
                                        <td class="text-success">Hoạt Động</td>
                                        <td>
                                            <a href="index.php?action=sualoaikm&id=<?php echo $l['MaLKM']; ?>" class="btn btn-warning">Sửa</a>
                                            <a href="index.php?action=khoaloaikm&id=<?php echo $l['MaLKM']; ?>&TrangThai=<?php echo $l['TrangThai'] ?>" class="btn btn-danger">Khóa</a>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-danger">Dừng</td>
                                        <td>
                                            <a href="index.php?action=sualoaikm&id=<?php echo $l['MaLKM']; ?>" class="btn btn-warning">Sửa</a>
                                            <a href="index.php?action=khoaloaikm&id=<?php echo $l['MaLKM']; ?>&TrangThai=<?php echo $l['TrangThai'] ?>" class="btn btn-primary">Mở</a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>

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