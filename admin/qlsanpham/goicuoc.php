<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p><a class="btn btn-info" href="index.php?action=themgoicuoc">Thêm</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Gói Cước</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col">Dung Lượng</th>
                            <th scope="col">Thời Gian Hiệu Lực</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Gói Cước</th>
                            <th scope="col">Mô Tả</th>
                            <th scope="col">Dung Lượng</th>
                            <th scope="col">Thời Gian Hiệu Lực</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($goicuoc as $gc) : ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?php echo $gc["Ten"] ?></td>
                                <td><?php echo $gc["MoTa"] ?></td>
                                <td><?php echo $gc["DungLuong"] ?></td>
                                <td><?php echo $gc["ThoiGianHieuLuc"] ?></td>
                                <td><?php echo $gc["Gia"] ?></td>
                                <td>
                                    <a href="index.php?action=suagc&id=<?php echo $gc['MaGC']; ?>" class="btn btn-warning">Sửa</a>
                                    <a href="index.php?action=xoagc&id=<?php echo  $gc['MaGC']; ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
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