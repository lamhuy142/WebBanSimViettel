<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
        <p><a class="btn btn-info" href="index.php?action=themnd">Thêm người dùng</a></p>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Người Dùng</th>
                            <th>Hình Ảnh</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Quyền</th>
                            <th>Mật Khẩu</th>
                            <th>Trạng Thái</th>
                            <th>Khóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên Người Dùng</th>
                            <th>Hình Ảnh</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Quyền</th>
                            <th>Mật Khẩu</th>
                            <th>Trạng Thái</th>
                            <th>Khóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($nguoidung as $n) :
                            foreach ($quyen as $q) :
                                if ($n["MaQ"] == $q["MaQ"]) { ?>
                                    <tr>
                                        <td><?php echo $n["HoTen"]; ?></td>
                                        <td><img width="50px" src="../../img/user/<?php echo $n["HinhAnh"]; ?>" alt="<?php echo $n["HinhAnh"]; ?>"></td>
                                        <td><?php echo $n["Email"]; ?></td>
                                        <td><?php echo $n["Sdt"]; ?></td>
                                        <td><?php echo $n["DiaChi"]; ?></td>
                                        <?php if($q["MaQ"] == 1) {?>
                                        <td class="text-success"><?php echo $q["TenQ"]; ?></td>
                                        <?php }else{?>
                                            <td class="text-primary"><?php echo $q["TenQ"]; ?></td>
                                            <?php } ?>
                                        <td><?php echo $n["MatKhau"]; ?></td>
                                        <?php if ($n["TrangThai"] == 1) { ?>
                                            <td class="text-success">Hoạt động</td>
                                        <?php } //end if TrangThai 
                                        else {
                                        ?>
                                            <td class="text-danger">Khóa</td>
                                        <?php }  ?>

                                        <td>
                                            <?php if ($n["TrangThai"] == 1) { ?>
                                                <a href="index.php?action=khoa&id=<?php echo $n['MaND']; ?>&TrangThai=<?php echo $n['TrangThai']; ?>" class="btn btn-danger">Khóa</a>
                                            <?php } else {
                                            ?>
                                                <a href="index.php?action=khoa&id=<?php echo $n['MaND']; ?>&TrangThai=<?php echo $n['TrangThai']; ?>" class="btn btn-warning">Mở</a>
                                            <?php } ?>
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