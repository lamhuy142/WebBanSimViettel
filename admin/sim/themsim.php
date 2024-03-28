<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">THÊM SIM</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulythem">

                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="optloaisim" class="form-label">Loại Sim</label>
                        <select class="form-control form-select" required name="optloaisim">
                            <option value="">Chọn loại sim</option>
                            <?php foreach ($loai as $l) : ?>
                                <option value="<?php echo $l['MaLS']; ?>"><?php echo $l['TenLS']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại sim.</div>
                    </div>
                    <!-- LOẠI THUÊ BAO -->
                    <div class="col md-3 mt-3">
                        <label for="optloaithuebao" class="form-label">Loại thuê bao</label>
                        <select class="form-control form-select" required name="optloaithuebao">
                            <option value="">Chọn loại thuê bao</option>
                            <?php foreach ($loaithuebao as $tb) : ?>
                                <?php if ($tb['LoaiThueBao'] == 1) { ?>
                                    <option value="1">Thuê Bao Trả Trước</option>
                                <?php } elseif ($tb['LoaiThueBao'] == 0) { ?>
                                    <option value="0">Thuê Bao Trả Sau</option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại thuê bao.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsosim" class="form-label">Số Sim</label>
                        <input class="form-control" type="number" name="txtsosim" value="<?php echo isset($SoSim) ? $SoSim : ''; ?>" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập số.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtmota" class="form-label">Mô Tả</label>
                        <textarea id="editor" rows="5" class="form-control" name="txtmota"></textarea>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập mô tả.</div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txttinhtrang" class="form-label">Trạng Thái</label>
                        <input class="form-control" type="number" name="txttinhtrang" value="1" readonly>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="fileanh" class="form-label">Hình Ảnh</label>
                        <input type="file" class="form-control" name="fileanh" required></input>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng chọn hình ảnh cho sản phẩm.</div>
                    </div>
                </div>

                <div class="md-3 mt-3">
                    <a href="index.php?action=sim" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
            </form>
        </div>

    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>