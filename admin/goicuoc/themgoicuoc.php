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
                        <input class="form-control" type="text" name="txttengc" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền tên gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtdungluong" class="form-label">Dung lượng</label>
                        <input class="form-control" type="number" name="txtdungluong" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Hãy nhập dung lượng gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtthoigianhieuluc" class="form-label">Thời gian hiệu lực</label>
                        <input class="form-control" type="text" name="txtthoigianhieuluc" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập thời hạn của gói cước.</div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="gia" class="form-label">Giá</label>
                        <input class="form-control" type="number" name="gia" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập giá tiền của gói cước.</div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtmota" class="form-label">Mô Tả</label>
                        <!-- <input class="form-control" id="editor" type="text" name="txtmota"> -->
                        <textarea id="editor" rows="5" class="form-control" name="txtmota"></textarea>
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