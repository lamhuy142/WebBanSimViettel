<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">DANH SÁCH SIM</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><a style="background-color: #EA0029; color: white;" class="btn " href="index.php?action=themsim">Thêm</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Loại Sim</th>
                            <th scope="col">Số Sim</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Loại Sim</th>
                            <th scope="col">Số Sim</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($sim as $s) :
                            foreach ($loaisim as $l) :
                                if ($s["MaLS"] == $l["MaLS"]) { ?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?php echo $l["TenLS"] ?></td>
                                        <td><?php echo $s["SoSim"] ?></td>
                                        <td><?php echo $s["GiaGoc"] ?></td>
                                        <td><?php echo $s["GiaBan"] ?></td>
                                        <!-- Tình Trạng -->
                                        <?php if ($s["TinhTrang"] == 1) { ?>
                                            <td class="text-success font-weight-bold"> Còn Bán</td>
                                        <?php } else { ?>
                                            <td class="text-danger font-weight-bold"> Hết Hàng</td>
                                        <?php } ?>
                                        <td>
                                            <a href="index.php?action=sua&id=<?php echo $s['MaSim']; ?>" class="btn btn-warning">Sửa</a>
                                            <!-- <a href="index.php?action=xoa&id=<php echo  $s['MaSim']; ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</a> -->
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