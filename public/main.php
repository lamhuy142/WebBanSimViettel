<?php include("inc/top.php");
// <!-- Slider -->
include("inc/sider.php");
// <!-- Banner -->
include("inc/banner.php");
$selectedOption = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : 'all';
?>
<!-- Hiện gói  cước -->
<!-- Goi cuoc -->
<section class=" bg0 p-t-100 p-b-50">
	<div class="container">
		<?php foreach ($loaigoicuoc as $lgc) :
			$i = 0; ?>
			<div class="heading_container heading_center p-4">
				<h2 class="">
					<a class="text-decoration-none text-muted" href=""><?php echo $lgc["TenLGC"] ?></a>
				</h2>
			</div>
			<div class="row">
				<?php foreach ($goicuoc as $gc) :
					if ($lgc["MaLGC"] == $gc["MaLGC"] && $i < 4) {
						$i++; ?>
						<div class="col-sm-6 col-md-4 col-lg-3 mb-4"> <!--Thêm lớp mb-4 để tạo khoảng cách giữa các card-->
							<div class="card">
								<div class="block2-pic hov-img0">
									<img class="card-img-top" src="../img/goicuoc/gc.png" alt="img">
									<a href="index.php?action=chitietgoicuoc&id=<?php echo $gc['MaGC'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
										Xem chi tiết
									</a>
								</div>

								<div class="card-body">
									<h5 class="card-title"><?php echo $gc["Ten"] ?></h5>
									<p><?php echo number_format($gc["Gia"]); ?>đ</p>

									<a style="background-color:white; " class="border rounded btn js-show-modal1">Đăng ký</a>
								</div>

							</div>
						</div>
				<?php }
				endforeach; ?>
				<div class="btn-box d-flex justify-content-end mt-3">
					<a style="color:#EF0033;" class="text-decoration-none" href="index.php?action=xemtheoloai&MaLGC=<?php echo $lgc["MaLGC"] ?>">
						Xem Tất Cả
					</a>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</section>

<section>
	<div class="container">
		<div class="heading_container heading_center p-4">
			<div class="row align-items-center">
				<div class="col">
					<h2 class="">
						<a class="text-decoration-none text-muted" href="">Sim Số</a>
					</h2>
					<style>
						a.filter-link:active {
							color: #EF0033 !important;
							/* Màu đỏ */
						}

						a.filter-link {
							color: #979797 !important;
							/* Màu mặc định */
						}
					</style>

					<div class="row mb-10">
						<div class="col-1">
							<a id="traTruocLink" class="filter-link" href="index.php?type=1" data-type="1">Trả trước</a>
						</div>
						<div class="col-1">
							<a id="traSauLink" class="filter-link" href="index.php?type=0" data-type="0">Trả sau</a>
						</div>
					</div>

					<table class="table" id="simTable">
						<thead class="rounded-top" style="background-color: #E4E4E4; color:#444966; ">
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Sim Số</th>
								<th scope="col">Giá Sim</th>
								<th scope="col">Chọn Mua</th>
							</tr>
						</thead>
						<?php
						$type = isset($_GET['type']) ? $_GET['type'] : '';
						foreach ($sim as $s) :
							foreach ($loaisim as $ls) :

								$loaithuebao = ($s['LoaiThueBao'] == '1');
								$hienthi = ($type == '1' && $loaithuebao) || ($type == '0' && !$loaithuebao);

								if ($ls["MaLS"] == $s["MaLS"] && $s["TinhTrang"] == 1 && $hienthi) {
						?>
									<tbody>
										<tr class="table-hover-bg-factor">
											<td scope="row"><?php echo $s['MaSim'] ?></td>
											<td><?php echo $s['SoSim'] ?></td>
											<td><?php echo number_format($ls['GiaBan']);  ?></td>
											<td><a style="background-color: #EF0033; color: white;" class="btn" href="index.php?action=themvaogio&MaSim=<?php echo $s['MaSim'] ?>&DonGia=<?php echo $ls['GiaBan'] ?>">Chọn Mua</a></td>
										</tr>
									</tbody>
						<?php
								}
							endforeach;
						endforeach;
						?>
					</table>

				</div>
			</div>
		</div>
		<div class="btn-box d-flex justify-content-end mt-3">
			<a style="color:#EF0033;" class="text-decoration-none" href="index.php?action=sim">
				Xem Tất Cả
			</a>
		</div>
	</div>
</section>



<!-- Blog -->
<?php include("inc/blog.php") ?>

<?php include("inc/bottom.php") ?>