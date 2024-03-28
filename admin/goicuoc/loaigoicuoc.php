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
                <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themgoicuoc">Thêm</a></p>
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
                        <?php foreach ($loai as $l) : ?>
                            <tr>
                                <td><?php echo $l["MaLGC"] ?></td>
                                <td><?php echo $l["TenLGC"] ?></td>
                                <?php if ($l["TrangThai"] == 0) { ?>
                                    <td class="text-secondary">Tắt</td>
                                <?php } else { ?>
                                    <td class="text-success">Bật</td>
                                <?php } ?>

                                <td>
                                    <a href=" index.php?action=sualgc&id=<?php echo $l['MaLGC']; ?>" class="btn btn-warning">Sửa</a>
                                        <!-- <a href="index.php?action=xoagc&id=<php echo  $l['MaGC']; ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</a> -->
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