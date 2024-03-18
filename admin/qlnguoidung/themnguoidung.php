<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold">THÊM NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulythemnd">

                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="optquyen" class="form-label">Phân quyền</label>
                            <select class="form-select" required name="optquyen">
                                <option value="">Chọn quyền người dùng</option>
                                <?php foreach ($quyen as $q) : ?>
                                    <option value="<?php echo $q['MaQ']; ?>"><?php echo $q['TenQ']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn loại quyền</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txthoten">Họ tên:</label>
                            <input type="text" class="form-control has-validation" id="username" name="txthoten" value="<?php echo isset($HoTen) ? $HoTen : ''; ?>" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Điền đầy đủ họ tên.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttendangnhap" class="form-label">Tên đăng nhập</label>
                            <input class="form-control has-validation" type="text" name="txttendangnhap" value="<?php echo isset($TenDangNhap) ? $TenDangNhap : ''; ?>" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ tên đăng nhập hợp lệ.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtsodienthoai" class="form-label">Số điện thoại</label>
                            <input class="form-control has-validation" type="number" name="txtsodienthoai" value="<?php echo isset($Sdt) ? $Sdt : ''; ?>" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại hợp lệ.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtdiachi" class="form-label">Địa chỉ</label>
                            <input class="form-control has-validation" type="text" name="txtdiachi" value="<?php echo isset($DiaChi) ? $DiaChi : ''; ?>" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtmatkhau" class="form-label">Mật khẩu</label>
                            <input class="form-control has-validation" type="text" name="txtmatkhau" value="<?php echo isset($MatKhau) ? $MatKhau : ''; ?>" required></input>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttrangthai" class="form-label">Trạng thái</label>
                            <input class="form-control" type="number" name="txttrangthai" value="1"></input>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="fileanh" value="<?php echo isset($HinhAnh) ? $HinhAnh : ''; ?>" required></input>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng chọn hình ảnh.</div>
                        </div>
                    </div>
                </div>
                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>