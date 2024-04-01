<?php include("../inc/top.php") ?>
<!-- <section class="shop_section layout_padding"> -->
<div class="col-12 col-md-10 m-auto">
    <div class="container card p-5">
        <div class="container rounded bg-white mt-5 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="luuhoso">
                <input type="hidden" value="<?php echo $nguoidung_ht['MaND']; ?>" name="MaND">
                <input type="hidden" value="<?php echo $nguoidung_ht['TrangThai']; ?>" name="TrangThai">
                <input type="hidden" value="<?php echo $nguoidung_ht['MaQ']; ?>" name="MaQ">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" width="150px" src="../../img/user/<?php echo $nguoidung_ht["HinhAnh"]; ?>">
                            <span class="font-weight-bold"><?php echo $nguoidung_ht["HoTen"] ?></span>
                        </div>
                    </div>

                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Thông Tin Cá Nhân</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label for="txthoten" class="labels">Họ Tên</label><input name="txthoten" type="text" class="form-control" value="<?php echo $nguoidung_ht['HoTen'] ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label for="sdt" class="labels">Số Điện Thoại</label><input name="sdt" type="number" class="form-control" value="<?php echo $nguoidung_ht['Sdt'] ?>"></div>
                                <div class="col-md-12"><label for="txtdiachi" class="labels">Địa Chỉ</label><input name="txtdiachi" type="text" class="form-control" value="<?php echo $nguoidung_ht["DiaChi"] ?>"></div>
                                <div class="col-md-12"><label for="txttendn" class="labels">Tên Đăng Nhập</label><input name="txttendn" type="text" class="form-control" value="<?php echo $nguoidung_ht["TenDangNhap"] ?>"></div>
                                <div class="col-md-12"><label for="txtmk" class="labels">Mật Khẩu</label><input name="txtmk" type="password" class="form-control" placeholder="education" value="<?php echo $nguoidung_ht["MatKhau"];?>"></div>
                                
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-success" type="submit">Lưu</botton>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="row mt-3">
                                <div class="col my-3">
                                    <label>Hình ảnh</label><br>
                                    <input type="hidden" name="hinhanh" value="<?php echo $nguoidung_ht["HinhAnh"]; ?>">
                                    <img src="../../img/user/<?php echo $nguoidung_ht["HinhAnh"]; ?>" width="100px" class="img-thumbnail">
                                    <p>
                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            Đổi hình ảnh
                                        </a>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <input type="file" class="form-control" name="filehinhanh">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- </section> -->
<?php include("../inc/bottom.php") ?>