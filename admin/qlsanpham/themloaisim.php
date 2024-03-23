<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">THÊM LOẠI SIM</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulythemls">

                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txttenloaisim" class="form-label">Tên loại sim</label>
                        <input class="form-control" type="text" name="txttenloaisim" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền tên loại sim.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="optloaicuoc" class="form-label">Loại gói cước</label>
                        <select class="form-control form-select" required name="optloaicuoc">
                            <option value="">Chọn loại gói cước</option>
                            <?php foreach ($goicuoc as $gc) : ?>
                                <option value="<?php echo $gc['MaGC']; ?>"><?php echo $gc['Ten']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="giagoc" class="form-label">Giá gốc</label>
                        <input class="form-control" type="number" name="giagoc" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập giá gốc.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="giaban" class="form-label">Giá bán</label>
                        <input class="form-control" type="number" name="giaban" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập giá bán.</div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="luotmua" class="form-label">Lượt mua</label>
                        <input class="form-control" type="number" name="luotmua" value="0" readonly>
                    </div>
                </div>

                <div class="md-3 mt-3">
                    <a href="index.php?action=loaisim" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include("../inc/bottom.php"); ?>