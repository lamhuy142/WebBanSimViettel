<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN LOẠI GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysuagc">
                <input type="hidden" name="MaLGC" value="<?php echo $loaigoicuoc_ht["MaLGC"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Tên Gói Cước</label>
                        <input class="form-control" type="text" name="txtten" required value="<?php echo $loaigoicuoc_ht["TenLGC"]; ?>">
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền tên gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="opttrangthai" class="form-label">Trạng thái</label>
                        <select class="form-select" name="opttrangthai">
                            <option value="">Chọn trạng thái</option>
                            <?php if ($loaigoicuoc_ht["TrangThai"] == 0) { ?>
                                <option value="<?php echo $loaigoicuoc_ht["TrangThai"] ?>" <?php echo "selected"; ?>>Tắt</option>
                            <?php } else { ?>
                                <option value="<?php echo $loaigoicuoc_ht["TrangThai"] ?>" <?php echo "selected"; ?>>Bật</option>
                            <?php } ?>
                        </select>
                    </div>
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