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
                            <?php foreach ($loaisim as $l) : ?>
                                <option value="<?php echo $l['MaLS']; ?>"><?php echo $l['TenLS']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại sim.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsosim" class="form-label">Số Sim</label>
                        <input class="form-control" type="text" name="txtsosim" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập số.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtmota" class="form-label">Mô Tả</label>
                        <input class="form-control" id="editor" type="text" name="txtmota" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập mô tả.</div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtgiagoc" class="form-label">Giá Gốc</label>
                        <input class="form-control" type="number" name="txtgiagoc" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Hãy điền giá gốc của sản phẩm.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiaban" class="form-label">Giá bán</label>
                        <input class="form-control" type="number" name="txtgiaban" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Hãy điền giá bán của sản phẩm.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txttinhtrang" class="form-label">Trạng Thái</label>
                        <input class="form-control" type="number" name="txttinhtrang" value="1" readonly>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsosim" class="form-label">Hình Ảnh</label>
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
        </div>

        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>