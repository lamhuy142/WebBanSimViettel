<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">THÊM LOẠI GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulythemlgc">

                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txttenlgc" class="form-label">Tên loại gói cước</label>
                        <input class="form-control" type="text" name="txttenlgc" value="<?php echo isset($LoaiGC) ? $LoaiGC : ''; ?>" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền tên loại gói cước.</div>
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