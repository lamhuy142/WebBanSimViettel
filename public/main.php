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
		<div class="heading_container heading_center p-4">
			<h2 class="">
				<a class="text-decoration-none text-muted" href="">Gói Cước</a>
			</h2>
		</div>
		<div class="tab-content p-t-50">
			<!-- - -->
			<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
				<!-- Slide2 -->
				<div class="wrap-slick2">
					<div class="slick2">
						<?php foreach ($goicuoc as $gc) : ?>
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img class="card-img-top" src="../img/goicuoc/gc.png" alt="img">

										<a href="index.php?action=xemchitiet&id=<?php echo $gc['MaGC'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Xem chi tiết
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo $gc["Ten"] ?>
											</a>

											<span class="stext-105 cl3">
												<?php echo $gc["Gia"] ?>
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
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Tab content <php echo mb_substr($gc["MoTa"], 0, 30) . "..."; ?>-->
	</div>
</section>
<!-- Blog -->
<?php include("inc/blog.php") ?>

<?php include("inc/bottom.php") ?>