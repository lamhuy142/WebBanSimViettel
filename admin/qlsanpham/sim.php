<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><a class="btn btn-info" href="index.php?action=themsim">Thêm</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Số Sim</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">Giá Bán</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Số Sim</th>
                            <th scope="col">Giá Gốc</th>
                            <th scope="col">Giá Bán</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($sim as $s) : ?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?php echo $s["SoSim"] ?></td>
                                        <td><?php echo $s["GiaGoc"] ?></td>
                                        <td><?php echo $s["GiaBan"] ?></td>
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