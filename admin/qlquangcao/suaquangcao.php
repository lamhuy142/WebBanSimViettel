<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN QUẢNG CÁO</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysuaqc">
                <input type="hidden" name="MaQC" value="<?php echo $quangcao_ht["MaQC"]; ?>">
                <div class="row g-3">
                    <div class="col md-1 mt-1">
                        <label for="txtduongdan" class="form-label">Đường dẫn</label>
                        <input class="form-control" name="txtduongdan" value="<?php echo $quangcao_ht['Url']; ?>" required></input>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập đường dẫn.</div>
                    </div>
                    <div class="col md-1 mt-1">
                        <label for="txttrangthai" class="form-label">Trạng Thái</label>
                        <input class="form-control" name="txttrangthai" value="<?php echo $quangcao_ht['TrangThai']; ?>" readonly></input>
                    </div>
                </div>
                </br>
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Hình ảnh</label><br>
                        <input type="hidden" name="hinhanh" value="<?php echo $quangcao_ht["HinhAnh"]; ?>">
                        <img src="../../img/quangcao/<?php echo $quangcao_ht["HinhAnh"]; ?>" width="100px" class="img-thumbnail">
                        <p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Đổi hình ảnh
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <input type="file" class="form-control" name="filehinhanh" required>
                            </div>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng chọn hình ảnh.</div>
                        </div>
                    </div>
                    

                </div>
                <div class="my-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>