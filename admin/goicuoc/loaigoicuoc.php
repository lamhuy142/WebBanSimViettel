<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themlgc">Thêm</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Mã Loại</th>
                            <th scope="col">Tên Loại Gói Cước</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">Mã Loại</th>
                            <th scope="col">Tên Loại Gói Cước</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($loai as $l) :
                            if (isset($id) && $l["MaLGC"] == $id) { ?>
                                <tr>
                                    <form action="" method="post">
                                        <input type="hidden" name="action" value="xulysualgc">
                                        <input type="hidden" name="MaLGC" value="<?php echo $l['MaLGC']; ?>">
                                        <input type="hidden" name="trangthai" value="<?php echo $l['TrangThai']; ?>">
                                        <td><?php echo $l["MaLGC"] ?></td>
                                        <td><input class="form-control" type="text" name="txtten" required value="<?php echo $l["TenLGC"]; ?>"></td>
                                        <?php if ($l["TrangThai"] == 0) { ?>
                                            <td class="text-danger">Tắt</td>
                                            <td>
                                                <input class="btn btn-success" type="submit" value="Lưu">
                                                <a href=" index.php?action=khoalgc&id=<?php echo $l['MaLGC']; ?>&TrangThai=<?php echo $l['TrangThai']; ?>" class="btn btn-success">Mở</a>
                                            </td>
                                        <?php } else { ?>
                                            <td class="text-success">Bật</td>
                                            <td>
                                                <input class="btn btn-success" type="submit" value="Lưu">
                                                <a href=" index.php?action=khoalgc&id=<?php echo $l['MaLGC']; ?>&TrangThai=<?php echo $l['TrangThai']; ?>" class="btn btn-danger">Khóa</a>
                                            </td>
                                        <?php } ?>
                                    </form>

                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td><?php echo $l["MaLGC"] ?></td>
                                    <td><?php echo $l["TenLGC"] ?></td>
                                    <?php if ($l["TrangThai"] == 0) { ?>
                                        <td class="text-danger">Tắt</td>
                                        <td>
                                            <a href=" index.php?action=sualgc&id=<?php echo $l['MaLGC']; ?>" class="btn btn-warning">Sửa</a>
                                            <a href=" index.php?action=khoalgc&id=<?php echo $l['MaLGC']; ?>&TrangThai=<?php echo $l['TrangThai']; ?>" class="btn btn-success">Mở</a>
                                        </td>
                                    <?php } else { ?>
                                        <td class="text-success">Bật</td>
                                        <td>
                                            <a href=" index.php?action=sualgc&id=<?php echo $l['MaLGC']; ?>" class="btn btn-warning">Sửa</a>
                                            <a href=" index.php?action=khoalgc&id=<?php echo $l['MaLGC']; ?>&TrangThai=<?php echo $l['TrangThai']; ?>" class="btn btn-danger">Khóa</a>
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