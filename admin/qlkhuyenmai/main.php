<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH CHƯƠNG TRÌNH KHUYẾN MÃI</h6>
        </div>
        <div class="card-body">
            <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themkm">Thêm</a></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Khuyến Mãi</th>
                            <th>Mô Tả</th>
                            <th>Giá Trị</th>
                            <th>Loại Khuyến Mãi</th>
                            <th>Ngày Bắt Dầu</th>
                            <th>Ngày Kết Thúc</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên Khuyến Mãi</th>
                            <th>Mô Tả</th>
                            <th>Giá Trị</th>
                            <th>Loại Khuyến Mãi</th>
                            <th>Ngày Bắt Dầu</th>
                            <th>Ngày Kết Thúc</th>
                            <th>Trạng Thái</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($khuyenmai as $km) :
                            foreach ($loaikhuyenmai as $l) :
                                if ($km["LoaiKM"] == $l["MaLKM"]) { ?>
                                    <tr>
                                        <td><?php echo $km["TenKM"]; ?></td>
                                        <!-- <td><img width="50px" src="../../img/user/<php echo $km["HinhAnh"]; ?>" alt="<php echo $km["HinhAnh"]; ?>"></td> -->
                                        <td><?php echo $km["MoTa"]; ?></td>
                                        <td><?php echo $km["GiaTriKM"]; ?></td>
                                        <td><?php echo $l["TenLKM"]; ?></td>
                                        <td><?php echo $km["NgayBD"]; ?></td>
                                        <td><?php echo $km["NgayKT"]; ?></td>
                                        <!-- Trạng Thái của chương trình khuyến mãi -->
                                        <?php
                                        if ($ngayht >= $km["NgayBD"] && $ngayht <= $km["NgayKT"]) { ?>
                                            <td class="text-success font-weight-bold">Chương trình đang hoạt động</td>
                                            <td>
                                                <a href="index.php?action=khoa&id=<?php echo $km['MaKM']; ?>" class="btn btn-danger">Khóa</a>
                                            </td>
                                            <?php } elseif ($ngayht < $km["NgayBD"]) { ?>
                                            <td class="text-success font-weight-bold">Chương trình sẽ bắt đầu vào ngày <?php echo $km["NgayBD"]; ?></td>
                                            <td>
                                                <a href="index.php?action=khoa&id=<?php echo $km['MaKM']; ?>" class="btn btn-danger">Khóa</a>
                                            </td>
                                        <?php } else { ?>
                                            <td class="text-success font-weight-bold">Chương trình đã kết thúc</td>
                                            <td>
                                                <a href="index.php?action=khoa&id=<?php echo $km['MaKM']; ?>" class="btn btn-danger">Khóa</a>
                                            </td>

                                        <?php } ?>
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