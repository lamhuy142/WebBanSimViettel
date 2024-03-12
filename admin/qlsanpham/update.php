<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CẬP NHẬT MỸ PHẨM</h6>
        </div>
        <div class="card-body">
            <form method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="id" value="<?php echo $mpht["id"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Phân loại</label>
                        <select class="form-control" name="optphanloai">
                            <?php foreach ($loai as $l) { ?>
                                <option value="<?php echo $l["id"]; ?>" <?php if ($l["id"] == $mpht["loai_id"]) echo "selected"; ?>><?php echo $l["tenloai"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col my-3">
                        <label>Tên mỹ phẩm</label>
                        <input class="form-control" type="text" name="txttenmp" required value="<?php echo $mpht["tenmp"]; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtthuonghieu" class="form-label">Thương hiệu</label>
                        <input class="form-control" type="text" name="txtthuonghieu" value="<?php echo $mpht['thuonghieu']; ?>">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtgiagoc" class="form-label">Giá nhập</label>
                        <input class="form-control" type="number" name="txtgiagoc" value="<?php echo $mpht['giagoc']; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiaban" class="form-label">Giá bán</label>
                        <input class="form-control" type="number" name="txtgiaban" value="<?php echo $mpht['giaban']; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsoluongton" class="form-label">Số lượng</label>
                        <input class="form-control" type="number" name="txtsoluongton" value="<?php echo $mpht['soluong']; ?>"></input>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtluotmua" class="form-label">Lượt mua</label>
                        <input type="text" class="form-control" readonly name="txtluotmua" value="<?php echo $mpht['luotmua']; ?>"></input>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtluotxem" class="form-label">Lượt xem</label>
                        <input type="text" class="form-control" readonly name="txtluotxem" value="<?php echo $mpht['luotxem']; ?>"></input>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txttinhtrang" class="form-label">Tình trạng</label>
                        <input id="editor" rows="5" class="form-control" name="txttinhtrang" value="<?php echo $mpht['tinhtrang']; ?>"></input>
                    </div>
                </div>

                <div class="md-3 mt-3">
                    <label for="txtmota" class="form-label">Mô tả</label>
                    <textarea id="editor" rows="5" class="form-control" name="txtmota"><?php echo $mpht['mota']; ?></textarea>
                </div>
                </br>
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Hình ảnh</label><br>
                        <input type="hidden" name="txthinh" value="<?php echo $mpht["hinhanh"]; ?>">
                        <img src="../../img/products/<?php echo $mpht["hinhanh"]; ?>" width="100px" class="img-thumbnail">
                        <input type="hidden" name="txthinh1" value="<?php echo $mpht["hinhanh1"]; ?>">
                        <img src="../../img/products/<?php echo $mpht["hinhanh1"]; ?>" width="100px" class="img-thumbnail">
                        <input type="hidden" name="txthinh2" value="<?php echo $mpht["hinhanh2"]; ?>">
                        <img src="../../img/products/<?php echo $mpht["hinhanh2"]; ?>" width="100px" class="img-thumbnail">
                        <input type="hidden" name="txthinh3" value="<?php echo $mpht["hinhanh3"]; ?>">
                        <img src="../../img/products/<?php echo $mpht["hinhanh3"]; ?>" width="100px" class="img-thumbnail">
                        <p>
                            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Đổi hình ảnh
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <input type="file" class="form-control" name="filehinhanh">
                                <input type="file" class="form-control" name="filehinhanh1">
                                <input type="file" class="form-control" name="filehinhanh2">
                                <input type="file" class="form-control" name="filehinhanh3">
                            </div>
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
<script>
    ClassicEditor
        .create(document.querySelector('#txtmota'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php include("../inc/bottom.php"); ?>