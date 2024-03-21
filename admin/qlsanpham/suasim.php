<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN SIM</h6>
        </div>
        <div class="card-body">
            <form method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="MaSim" value="<?php echo $sim_ht["MaSim"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Phân loại</label>
                        <select class="form-control" name="optloaisim">
                            <?php foreach ($loai as $l) { ?>
                                <option value="<?php echo $l["MaLS"]; ?>" <?php if ($l["MaLS"] == $sim_ht["MaLS"]) echo "selected"; ?>><?php echo $l["TenLS"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- LOẠI THUÊ BAO -->
                    <div class="col md-3 mt-3">
                        <label for="optloaithuebao" class="form-label">Loại thuê bao</label>
                        <select class="form-control form-select" required name="optloaithuebao">
                            <option value="">Chọn loại thuê bao</option>
                            <?php foreach ($loaithuebao as $tb) : ?>
                                <option value="<?php echo $tb['LoaiThueBao']; ?>" <?php if ($tb['LoaiThueBao'] == $sim_ht['LoaiThueBao']) echo 'selected'; ?>>
                                    <?php echo $tb['LoaiThueBao'] == 1 ? 'Thuê Bao Trả Trước' : 'Thuê Bao Trả Sau'; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại thuê bao.</div>
                    </div>

                    <div class="col my-3">
                        <label>Số Sim</label>
                        <input class="form-control" type="text" name="txtsosim" required value="<?php echo $sim_ht["SoSim"]; ?>">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtgiagoc" class="form-label">Giá Gốc</label>
                        <input class="form-control" type="number" name="txtgiagoc" value="<?php echo $sim_ht['GiaGoc']; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiaban" class="form-label">Giá Bán</label>
                        <input class="form-control" type="number" name="txtgiaban" value="<?php echo $sim_ht['GiaBan']; ?>">
                    </div>
                </div>
                <div class="md-3 mt-3">
                    <label for="txtmota" class="form-label">Mô tả</label>
                    <textarea id="editor" rows="5" class="form-control" name="txtmota"><?php echo $sim_ht['MoTa']; ?></textarea>
                </div>
                <div class="md-1 mt-1">
                    <label for="txttinhtrang" class="form-label">Trạng Thái</label>
                    <input class="form-control" name="txttinhtrang" value="<?php echo $sim_ht['TinhTrang']; ?>" readonly></input>
                </div>
                </br>
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Hình ảnh</label><br>
                        <input type="hidden" name="hinhanh" value="<?php echo $sim_ht["HinhAnh"]; ?>">
                        <img src="../../img/sim/sim/<?php echo $sim_ht["HinhAnh"]; ?>" width="100px" class="img-thumbnail">
                        <p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Đổi hình ảnh
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <input type="file" class="form-control" name="filehinhanh">
                            </div>
                        </div>

                    </div>
                </div>
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