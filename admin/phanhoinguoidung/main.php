<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH PHẢN HỒI</h6>
        </div>
        <div class="card-body">
            <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themnd">Thêm</a></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Người Dùng</th>
                            <th>Tên Người Dùng</th>
                            <th>Nội Dung</th>
                            <th>Hình Ảnh</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Người Dùng</th>
                            <th>Tên Người Dùng</th>
                            <th>Nội Dung</th>
                            <th>Hình Ảnh</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($danhgia as $d) :
                            foreach ($nguoidung as $n) :
                                if ($n["MaND"] == $d["MaND"]) { ?>
                                    <tr>
                                        <td><?php echo $d["MaND"]; ?></td>
                                        <td><?php echo $n["HoTen"]; ?></td>
                                        <td><?php echo $d["NoiDung"]; ?></td>
                                        <td><img width="50px" src="../../img/user/<?php echo $d["urlHinhAnh"]; ?>" alt="<?php echo $d["urlHinhAnh"]; ?>"></td>
                                        <?php if ($d["TraLoi"] != null) { ?>
                                            <td class="text-sussecc"><i class=" bi bi-check-circle-fill"></i> Đã trả lời</td>
                                        <?php } else { ?><td class="text-secondary"><i class="bi bi-x-circle-fill"></i> Chưa trả lời</td> <?php } ?>
                                        <td><a class="btn btn-primary" href="index.php?action=phanhoi&id=<?php echo $d["MaDG"] ?>">Phản Hồi</a></td>
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