<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysuagc">
                <input type="hidden" name="MaGC" value="<?php echo $goicuoc_ht["MaGC"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Tên Gói Cước</label>
                        <input class="form-control" type="text" name="txtten" required value="<?php echo $goicuoc_ht["Ten"]; ?>">
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền tên gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="optloai" class="form-label">Loại gói cước</label>
                        <select class="form-select" name="optloai">
                            <option value="">Chọn loại gói cước</option>
                            <?php foreach ($loai as $l) : ?>
                                <option value="<?php echo $l["MaLGC"] ?>" <?php if ($l["MaLGC"] == $goicuoc_ht["MaLGC"]) echo "selected"; ?>><?php echo $l["TenLGC"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="gia" class="form-label">Giá</label>
                        <input class="form-control" type="number" name="gia" required value="<?php echo $goicuoc_ht['Gia']; ?>">
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập giá tiền của gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="giatrikm" class="form-label">Giá trị khuyến mãi</label>
                        <input class="form-control" type="number" name="giatrikm" required value="<?php echo $goicuoc_ht['GiaTriKM']; ?>">
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập giá trị khuyến mãi.</div>
                    </div>
                </div>
                <div class="md-3 mt-3">
                    <label for="txtmota" class="form-label">Mô tả</label>
                    <textarea id="editor" rows="5" class="form-control" name="txtmota"><?php echo $goicuoc_ht['MoTa']; ?></textarea>
                    <div class="valid-feedback">Hợp lệ.</div>
                    <div class="invalid-feedback">Hãy nhập mô tả gói cước.</div>
                </div>
                <div class="col md-3 mt-3">
                    <label for="txtthoihan" class="form-label">Thời Hạn</label>
                    <input class="form-control" type="text" name="txtthoihan" required value="<?php echo $goicuoc_ht['ThoiHan']; ?>">
                    <div class="valid-feedback">Hợp lệ.</div>
                    <div class="invalid-feedback">Hãy nhập dung lượng gói cước.</div>
                </div>
                </br>
                <div class="my-3">
                    <a href="index.php?action=sim" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>