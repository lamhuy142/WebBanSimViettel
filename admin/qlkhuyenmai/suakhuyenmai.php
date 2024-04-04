<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN KHUYẾN MÃI</h6>
        </div>
        <div class="card-body">

            <!-- Mã PHP để hiển thị dữ liệu -->
            <form method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="MaKM" value="<?php echo $khuyenmai_ht['MaKM'] ?>">

                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttenkm" class="form-label">Tên chương trình </label>
                            <input class="form-control" type="text" name="txttenkm" value="<?php echo $khuyenmai_ht['TenKM'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="optloai" class="form-label">Loại sim</label>
                            <select class="form-select" name="optloai">
                                <option value="">Chọn loại sim</option>
                                <?php foreach ($loaisim as $ls) : ?>
                                    <option value="<?php echo $ls["MaLS"] ?>" <?php if ($ls["MaLS"] == $khuyenmai_ht["MaLS"]) echo "selected"; ?>><?php echo $ls["TenLS"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="optloaikm" class="form-label">Loại khuyến mãi</label>
                            <select class="form-select" name="optloaikm">
                                <option value="">Chọn loại khuyến mãi</option>
                                <?php foreach ($loaikhuyenmai as $l) : ?>
                                    <option value="<?php echo $l["MaLKM"] ?>" <?php if ($l["MaLKM"] == $khuyenmai_ht["LoaiKM"]) echo "selected"; ?>><?php echo $l["TenLKM"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtgiatri" class="form-label">Giá trị khuyến mãi</label>
                            <input class="form-control" type="number" name="txtgiatri" value="<?php echo $khuyenmai_ht['GiaTriKM'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttrangthai" class="form-label">Trạng Thái</label>
                            <input class="form-control" type="number" name="txttrangthai" value="<?php echo $khuyenmai_ht['TrangThai'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="ngaybd" class="form-label">Ngày bắt đầu</label>
                            <input class="form-control" type="date" name="ngaybd" value="<?php echo $khuyenmai_ht['NgayBD']; ?>"> <!-- ? date('d/m/Y', strtotime($khuyenmai_ht['NgayBD'])) :  '' -->
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="ngaykt" class="form-label">Ngày kết thúc</label>
                            <input class="form-control" type="date" name="ngaykt" value="<?php echo $khuyenmai_ht['NgayKT'] ;  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtmota" class="form-label">Mô tả</label>
                            <textarea id="editor" rows="5" class="form-control" name="txtmota"><?php echo $khuyenmai_ht['MoTa']  ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col my-3">
                        <label>Hình ảnh</label><br>
                        <input type="hidden" name="hinhanh" value="<?php echo $khuyenmai_ht["HinhAnh"]; ?>">
                        <img src="../../img/khuyenmai/<?php echo $khuyenmai_ht["HinhAnh"]; ?>" width="100px" class="img-thumbnail">
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
                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
            </form>



        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>