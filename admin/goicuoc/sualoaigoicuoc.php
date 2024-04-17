<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN LOẠI GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysualgc">
                <input type="hidden" name="MaLGC" value="<?php echo $loaigoicuoc_ht["MaLGC"]; ?>">
                <input type="hidden" name="trangthai" value="<?php echo $loaigoicuoc_ht["TrangThai"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Tên Gói Cước</label>
                        <input class="form-control" type="text" name="txtten" required value="<?php echo $loaigoicuoc_ht["TenLGC"]; ?>">
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng điền tên gói cước.</div>
                    </div>
                </div>
                </br>
                <div class="my-3">
                    <a href="index.php?action=loaigoicuoc" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>