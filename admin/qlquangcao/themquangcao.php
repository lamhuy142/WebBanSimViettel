<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold">THÊM QUẢNG CÁO</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulythemqc">
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label>Hình ảnh</label>
                            <input type="file" class="form-control" name="fileanh" value="<?php echo isset($HinhAnh) ? $HinhAnh : ''; ?>" required></input>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng chọn hình ảnh.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txturl" class="form-label">Url</label>
                            <input class="form-control" type="text" name="txturl" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập đường dẫn.</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttrangthai" class="form-label">Trạng thái</label>
                            <input class="form-control" type="number" name="txttrangthai" value="1"></input>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtmota" class="form-label">Mô Tả</label>
                            <input class="form-control has-validation" id="editor" type="text" name="txtmota" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng nhập mô tả.</div>
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