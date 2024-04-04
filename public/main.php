<?php include("inc/top.php");
// <!-- Slider -->
include("inc/sider.php");
// <!-- Banner -->
include("inc/banner.php");
$selectedOption = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : 'all';
?>


<!-- Goi cuoc -->
<section class="sec-product bg0 p-t-100 p-b-50">
	<div class="container">
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Gói Cước
			</h3>
		</div>

		<!-- Tab02 -->
		<div class="tab01">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php foreach ($loaigoicuoc as $lgc) : ?>
					<li class="nav-item p-b-10">
						<a id="<?php echo $lgc['MaLGC'] ?>_tab" class="nav-link  
		<?php if (strpos($_SERVER["REQUEST_URI"], $lgc['MaLGC']) != false  || $lgc['MaLGC'] == 2) echo "active"; ?>
		" data-toggle="tab" href="#<?php echo $lgc['MaLGC'] ?>" role="tab"><?php echo $lgc['TenLGC'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>

			<!-- Goi Cuoc -->
			<div class="tab-content p-t-50">
				<!-- - -->
				<div class="tab-pane fade" id="top-rate" role="tabpanel">
					<!-- Slide2 -->
					<?php foreach ($goicuoc as $gc) :
						foreach ($loaigoicuoc as $lgc) :
							if ($gc["MaLGC"] == $lgc["MaLGC"]) { ?>
								<div class="wrap-slick2">
									<div class="slick2">
										<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
											<!-- Block2 -->
											<div class="block2">
												<div class="block2-pic hov-img0">
													<img src="images/product-03.jpg" alt="IMG-PRODUCT">

													<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
														Quick View
													</a>
												</div>

												<div class="block2-txt flex-w flex-t p-t-14">
													<div class="block2-txt-child1 flex-col-l ">
														<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
															<?php echo $gc["TenGC"] ?>
														</a>

														<span class="stext-105 cl3">
															<?php echo $gc["Gia"] ?>
														</span>
													</div>

													<div class="block2-txt-child2 flex-r p-t-3">
														<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
															<?php echo $gc["MoTa"] ?>
															<!-- <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON"> -->
															<!-- <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON"> -->
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
					<?php }
						endforeach;
					endforeach; ?>


					<!-- <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="images/product-16.jpg" alt="IMG-PRODUCT">

								<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
									Quick View
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										Square Neck Back
									</a>

									<span class="stext-105 cl3">
										$29.64
									</span>
								</div>

								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Bán Sim
			</h3>
		</div>

		<!-- Tab01 -->
		<div class="tab01 p-2">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php foreach ($loaisim as $l) : ?>
					<li class="nav-item p-b-10">
						<a id="<?php echo $l['MaLS'] ?>_tab" class="nav-link  
		<?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false  || $l['MaLS'] == 3) echo "active"; ?>
		" data-toggle="tab" href="#<?php echo $l['MaLS'] ?>" role="tab"><?php echo $l['TenLS'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

	<!-- <section class="sec-product bg0 p-t-100 p-b-50">
		<div class="container">

		</div>
	</section> -->

	<div class="tab-content p-t-50">
		<?php foreach ($loaisim as $l) : ?>
			<!-- - -->
			<div class="tab-pane fade  <?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false || $l['MaLS'] == 3) echo "show active"; ?>" id="<?php echo $l["MaLS"] ?>" role="tabpanel">
				<!-- SIM DATA -->
				<div class=" row mx-auto" style=" width: 200px;">
					<div class="form-check form-check-inline">
						<input style="margin-left: 5px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
						<label class="form-check-label" for="inlineRadio1"> Trả Trước</label>
					</div>
					<div class="form-check form-check-inline">
						<input style="margin-left: 5px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
						<label class="form-check-label" for="inlineRadio2"> Trả Sau</label>
					</div>
				</div>

				<table class="table">
					<thead class="rounded-top" style="background-color: #E4E4E4; color:#444966; ">
						<tr>
							<th scope=" col">STT</th>
							<th scope="col">Sim Số</th>
							<th scope="col">Giá Sim</th>
							<th scope="col">Chọn Mua</th>
						</tr>
					</thead>
					<?php foreach ($sim as $s) :
						// Kiểm tra nếu sim không thuộc loại được chọn thì bỏ qua
						if ($s['MaLS'] == $l['MaLS'] && ($selectedOption == 'all' || $selectedOption == $s['TrangThai'])) { ?>
							<tbody>
								<tr class="table-hover-bg-factor">
									<td scope="row"><?php echo $s['MaSim'] ?></td>
									<td><?php echo $s['SoSim'] ?></td>
									<td><?php echo number_format($l['GiaBan']);  ?></td>
									<td><a style="background-color: #EF0033; color: white;" class="btn" href="">Mua Ngay</a></td>
								</tr>
							</tbody>
					<?php
						}
					endforeach; ?>
				</table>
			</div>
		<?php endforeach; ?>
	</div>
	</div>
	</div>
</section>
<!-- Blog -->
<?php include("inc/blog.php") ?>

<?php include("inc/bottom.php") ?>