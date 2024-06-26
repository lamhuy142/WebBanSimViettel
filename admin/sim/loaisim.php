<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH LOẠI SIM</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themls">Thêm</a></p>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Mã Loại Sim</th>
                            <th scope="col">Tên Loại Sim</th>
                            <th scope="col">Loại Gói Cước</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Lượt Mua</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">Mã Loại Sim</th>
                            <th scope="col">Tên Loại Sim</th>
                            <th scope="col">Loại Gói Cước</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Lượt Mua</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($loai as $ls) :
                            foreach ($goicuoc as $gc) :
                                if ($ls["MaGC"] == $gc["MaGC"]) { ?>
                                    <tr>
                                        <td><?php echo $ls["MaLS"] ?></td>
                                        <td><?php echo $ls["TenLS"] ?></td>
                                        <td><?php echo $gc["Ten"] ?></td>
                                        <td><?php echo number_format($ls["GiaGoc"])  ?></td>
                                        <td><?php echo number_format($ls["GiaBan"]) ?></td>
                                        <td><?php echo $ls["LuotMua"] ?></td>
                                        <?php if ($ls["TrangThai"] == 1) { ?>
                                            <td class="text-success font-weight-bold"> Hoạt Động</td>
                                            <td>
                                                <a href="index.php?action=suals&id=<?php echo $ls['MaLS']; ?>" class="btn btn-warning">Sửa</a>
                                                <a href="index.php?action=doitrangthails&id=<?php echo $ls['MaLS']; ?>&TrangThai=<?php echo $ls['TrangThai']; ?>" class="btn btn-secondary">Khóa</a>
                                            </td>
                                        <?php } else { ?>
                                            <td class="text-danger font-weight-bold"> Ngừng</td>
                                            <td>
                                                <a href="index.php?action=suals&id=<?php echo $ls['MaLS']; ?>" class="btn btn-warning">Sửa</a>
                                                <a href="index.php?action=doitrangthails&id=<?php echo $ls['MaLS']; ?>&TrangThai=<?php echo $ls['TrangThai']; ?>" class="btn btn-primary">Mở</a>
                                            </td>
                                        <?php } ?>
                                    </tr>

                        <?php
                                }
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