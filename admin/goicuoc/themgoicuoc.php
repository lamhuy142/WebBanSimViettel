<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">THÊM GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulythemgc">

                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txttengc" class="form-label">Tên gói cước</label>
                        <input class="form-control" type="text" name="txttengc" value="<?php echo isset($GoiCuoc) ? $GoiCuoc : ''; ?>" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền tên gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="optloaigc" class="form-label">Loại gói cước</label>
                        <select class="form-control form-select" required name="optloaigc">
                            <option value="">Chọn loại gói cước</option>
                            <?php foreach ($loai as $l) : ?>
                                <option <?php if (isset($LoaiGC)) if ($LoaiGC == $l['MaLGC']) echo 'selected' ?> value="<?php echo $l['MaLGC']; ?>"><?php echo $l['TenLGC']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiatrikm" class="form-label">Giá trị khuyến mãi</label>
                        <input class="form-control" type="number" name="txtgiatrikm" value="<?php echo isset($GiaTriKM) ? $GiaTriKM : ''; ?>" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Hãy nhập giá trị khuyến mãi.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtthoihan" class="form-label">Thời hạn</label>
                        <input class="form-control" type="text" name="txtthoihan" value="<?php echo isset($ThoiHan) ? $ThoiHan : ''; ?>" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập thời hạn của gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="gia" class="form-label">Giá</label>
                        <input class="form-control" type="number" name="gia" value="<?php echo isset($Gia) ? $Gia : ''; ?>" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập giá tiền của gói cước.</div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtmota" class="form-label">Mô Tả</label>
                        <textarea id="editor" rows="5" class="form-control" name="txtmota">
                            <?php echo isset($MoTa) ? $MoTa : ''; ?>
                        </textarea>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Hãy nhập mô tả gói cước.</div>
                    </div>
                </div>

                <div class="md-3 mt-3">
                    <a href="index.php?action=goicuoc" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
        </div>

        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>