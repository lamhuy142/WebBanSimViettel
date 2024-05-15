<?php include("inc/top.php"); ?>
<section class="shop_section layout_padding">
    <div class="container">
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
                            <input type="hidden" value="<?php echo $_SESSION['nguoidung']['TrangThai']; ?>" name="TrangThai">
                            <input type="hidden" value="<?php echo $_SESSION['nguoidung']['MaQ']; ?>" name="MaQ">
                            <input type="hidden" name="action" value="xlhoso">
                            <div class="text-center">
                                <img class="img-thumbnail" src="
                    <?php
                    if ($_SESSION['nguoidung']['HinhAnh'] == NULL) {
                        echo '../img/user/user_md.png';
                    } else echo '../img/user/' . $_SESSION['nguoidung']['HinhAnh']; ?>" alt="<?php echo $_SESSION['nguoidung']['HoTen'];  ?>" width="100px">
                            </div>
                            <div class="my-3">
                                <label for="txthoten" class="form-label">Họ tên:</label>
                                <input type="text" class="form-control" placeholder="Họ tên" name="txthoten" value="<?php echo $_SESSION['nguoidung']['HoTen']; ?>" >
                            </div>
                            <div class="my-3">
                                <label for="sdt" class="form-label">Số điện thoại:</label>
                                <input type="number" class="form-control" placeholder="Số điện thoại" name="sdt" value="<?php echo $_SESSION['nguoidung']['Sdt']; ?>" >
                            </div>
                            <div class="my-3">
                                <label for="txtdiachi" class="form-label">Địa chỉ:</label>
                                <input type="text" class="form-control" placeholder="Hãy nhập địa chỉ đầy đủ" name="txtdiachi" value="<?php echo $_SESSION['nguoidung']['DiaChi']; ?>" required>
                            </div>
                            <div class="my-3 mt-3">
                                <label for="txttendn" class="form-label">Tên đăng nhập:</label>
                                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="txttendn" value="<?php echo $_SESSION['nguoidung']['TenDangNhap']; ?>" >
                            </div>
                            <div class="my-3">
                                <label for="txtmk" class="form-label">Mật khẩu:</label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới nếu muốn đổi" name="txtmk" >
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
                                <!-- <input class="btn btn-warning" type="reset" value="Không"> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("inc/bottom.php"); ?>