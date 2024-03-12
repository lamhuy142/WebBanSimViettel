<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">THÊM NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulythem">

                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="optquyen" class="form-label">Phân quyền</label>
                            <select class="form-select" name="optquyen">
                                <?php foreach ($loai as $l) : ?>
                                    <option value="<?php echo $l['id']; ?>"><?php echo $l['tenlnd']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txthoten" class="form-label">Họ tên người dùng</label>
                            <input class="form-control" type="text" name="txthoten" placeholder="Nhập họ tên">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtemail" class="form-label">Email</label>
                            <input class="form-control" type="email" name="txtemail" placeholder="Nhập email">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtsodienthoai" class="form-label">Số điện thoại</label>
                            <input class="form-control" type="number" name="txtsodienthoai" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtdiachi" class="form-label">Địa chỉ</label>
                            <input class="form-control" type="text" name="txtdiachi" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtmatkhau" class="form-label">Mật khẩu</label>
                            <input class="form-control" type="text" name="txtmatkhau" placeholder="Nhập mật khẩu"></input>
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
                            <input type="file" class="form-control" name="fileanh"></input>
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