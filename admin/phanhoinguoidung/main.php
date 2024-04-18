<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH PHẢN HỒI</h6>
        </div>
        <div class="card-body">
            <!-- <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themnd">Thêm</a></p> -->

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Khách Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Nội Dung</th>
                            <!-- <th>Trả Lời</th> -->
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã Khách Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Nội Dung</th>
                            <!-- <th>Trả Lời</th> -->
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($danhgia as $d) :
                            $traloi = false; // Biến để kiểm tra xem đã có phản hồi cho bình luận hiện tại hay chưa
                            foreach ($nguoidung as $n) :
                                if ($n["MaND"] == $d["MaND"]) { ?>
                                    <tr>
                                        <td><?php echo $d["MaND"]; ?></td>
                                        <td><?php echo $n["HoTen"]; ?></td>
                                        <td><?php echo $d["NoiDung"]; ?></td>
                                        <?php foreach ($traloidanhgia as $t) :
                                            if ($t["TraLoi"] != null && $t["MaDG"] == $d["MaDG"]) {
                                                $traloi = true; // Đánh dấu đã có phản hồi cho bình luận hiện tại
                                            }
                                        endforeach; ?>

                                        <?php if ($traloi) { ?>
                                            <td><span class="text-success"><i class="bi bi-check-circle-fill"></i> Đã trả lời</span></td>
                                            <td><a class="btn btn-secondary disabled" href="index.php?action=phanhoi&id=<?php echo $d["MaDG"] ?>">Phản Hồi</a></td>
                                        <?php } else { ?>
                                            <td><span class="text-warning"><i class="bi bi-x-circle-fill"></i> Chưa trả lời</span></td>
                                            <td><a class="btn btn-primary" href="index.php?action=phanhoi&id=<?php echo $d["MaDG"] ?>">Phản Hồi</a></td>
                                        <?php } ?>
                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach;
                        ?>

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