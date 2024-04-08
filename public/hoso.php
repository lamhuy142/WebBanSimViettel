<?php include("inc/top.php"); ?>
<section class="shop_section layout_padding">
    <div class="row">
        <div class="col-12 col-md-10 m-auto">
            <div class="container card p-5">
                <div class="heading_container heading_center">
                    <h2>HỒ SƠ NGƯỜI DÙNG</h2>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="index.php">
                        <input type="hidden" name="MaND" value="<?php echo $_SESSION['nguoidung']['MaND']; ?>">
                        <input type="hidden" name="HinhAnh" value="<?php echo $_SESSION['nguoidung']['HinhAnh']; ?>">
                        <input type="hidden" name="action" value="xlhoso">
                        <div class="text-center">
                            <img class="img-thumbnail" src="
                    <?php
                    if ($_SESSION['nguoidung']['HinhAnh'] == NULL) {
                        echo '../img/user/user.png';
                    } else echo '../img/user/' . $_SESSION['nguoidung']['HinhAnh']; ?>" alt="<?php echo $_SESSION['nguoidung']['HoTen'];  ?>" width="100px">
                        </div>
                        <div class="my-3 mt-3">
                            <label for="tendangnhap" class="form-label">Tên đăng nhập:</label>
                            <input type="tendangnhap" class="form-control" id="tendangnhap" placeholder="Enter tendangnhap" name="txttendangnhap" value="<?php echo $_SESSION['nguoidung']['TenDangNhap']; ?>" required>
                        </div>
                        <div class="my-3">
                            <label for="txtsdt" class="form-label">Số điện thoại:</label>
                            <input type="number" class="form-control" id="sdt" placeholder="Số điện thoại" name="txtsdt" value="<?php echo $_SESSION['nguoidung']['Sdt']; ?>" required>
                        </div>
                        <div class="my-3">
                            <label for="txtdiachi" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="txtdiachi" value="<?php echo $_SESSION['nguoidung']['DiaChi']; ?>" required>
                        </div>
                        <div class="my-3">
                            <label for="txttennd" class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" id="tennd" placeholder="Họ tên" name="txttennd" value="<?php echo $_SESSION['nguoidung']['HoTen']; ?>" required>
                        </div>
                        <div class="my-3">
                            <label for="fhinhanh" class="form-label">Đổi hình đại diện</label>
                            <input type="file" class="form-control" name="fhinhanh">
                        </div>
                        <div class="form-check my-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="my-3 text-center">
                            <input class="btn btn-primary" type="submit" value="Cập nhật">
                            <input class="btn btn-warning" type="reset" value="Không">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include("inc/bottom.php"); ?>