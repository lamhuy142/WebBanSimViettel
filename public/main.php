<?php include("inc/top.php");
// <!-- Slider -->
include("inc/sider.php");
// <!-- Banner -->
include("inc/banner.php");
$selectedOption = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : 'all';
?>


<!-- GÓI CƯỚC  -->
<!-- <div class="tab-content p-t-50">
			
			<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
				Slide2 
				<div class="wrap-slick2">
					<div class="slick2">
						<php foreach ($goicuoc as $gc) : ?>
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								
								<div class=""> block2
									<div class="block2-pic hov-img0">
										<img class="card-img-top" src="../img/goicuoc/gc.png" alt="img">

										<a href="index.php?action=chitietgoicuoc&id=<php echo $gc['MaGC'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 "> js-show-modal1
											Xem chi tiết
										</a>
									</div>

									<div class=" flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail.html" class="text-decoration-none stext-104 cl4 trans-04 p-b-6">js-addwish-b2
												<php echo $gc["Ten"] ?>
											</a>

											<span class="stext-105 cl3">
												<php echo number_format($gc["Gia"]); ?>
											</span>
											<span class="stext-105 cl3">
												<php echo mb_substr($gc["MoTa"], 0, 30) . "..."; ?>
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative ">js-addwish-b2
												<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
											</a>
										</div>
										<a class="btn js-show-modal1">Đăng ký</a>
									</div>
								</div>
							</div>
						<php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		Tab content -->
<!-- ======================================= -->

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

			</div>
		<?php endforeach; ?>
		<div class="btn-box d-flex justify-content-end mt-3">
			<a style="color:#EF0033;" class="text-decoration-none" href="index.php?action=goicuoc">
				Xem Tất Cả
			</a>
		</div>
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
								// Giả sử bạn có một trường trong database của sim là 'LoaiThueBao' lưu trữ là 'prepaid' hoặc 'postpaid'
								$loaithuebao = ($s['LoaiThueBao'] == '1');
								$hienthi = ($type == '1' && $loaithuebao) || ($type == '0' && !$loaithuebao);

								if ($ls["MaLS"] == $s["MaLS"] && $s["TinhTrang"] == 1 && $hienthi) {
									// if ($ls["MaLS"] == $s["MaLS"] && $s["TinhTrang"] == 1) {
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