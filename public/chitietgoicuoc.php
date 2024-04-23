<?php include("inc/top.php") ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=blog" class="stext-109 cl8 hov-cl1 trans-04">
			Chi tiết gói cước
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
			<?php echo $goicuoc_ht["Ten"] ?>
		</span>
	</div>
</div>
<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
	<div style="padding-left:0;" class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<!--  -->
					<div class="container">
						<div class="row">
							<div style="height: 60px;" class="col mt-2 border rounded mr-2 pt-1 pl-2">
								<div class="row">
									<div style="width: 20px; height:50px;" class="col-6">
										<span class="">
											<img style="width: 30px; height:30px;" src="../img/goicuoc/icon-service-sm.png" alt="icon">
										</span>
									</div>
									<div class="col-6 ml-2">
										<div>
											<h6 class="-name" style="line-height: 14px; width:150px;">
												Tên gói cước
											</h6>
											<p class="-value" style="line-height: 24px; overflow: visible;">
												<?php echo $goicuoc_ht["Ten"] ?>
											</p>
										</div>

									</div>
								</div>
							</div>
							<div style="height: 60px;" class="col mt-2 border rounded mr-2 pt-1 pl-2">
								<div class="row">
									<div style="width: 20px; height:50px;" class="col-6 ">
										<span class="">
											<img style="width: 30px; height:30px;" src="../img/goicuoc/icon-wallet-sm.png" alt="icon">
										</span>
									</div>
									<div class="col-6 ml-2">
										<div class="-info">
											<h6 class="-name" style="line-height: 14px; width:150px;">
												Giá gói cước
											</h6>
											<p class="-value" style="line-height: 24px; overflow: visible;">
												<?php echo number_format($goicuoc_ht["Gia"]); ?>đ
											</p>
										</div>
									</div>
								</div>
							</div>
							<div style="height: 60px; overflow: hidden;" class="col mt-2 border rounded mr-2 pt-1 pl-2">
								<div class="row align-items-center">
									<div style="width: 20px; height:50px;" class="col-5">
										<span class="">
											<img style="width: 30px; height:30px;" src="../img/goicuoc/icon-calendar-sm.png" alt="icon">
										</span>
									</div>
									<div class="col-7 ml-3">
										<div class="-info">
											<h6 class="-name" style="line-height: 14px; width:150px;">
												Thời gian
											</h6>
											<p class="-value" style="line-height: normal; overflow: visible; margin: 0;">
												<?php echo $goicuoc_ht["ThoiHan"] ?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- CHI TIET -->
					<div class="">
						<div class="">
							<h5 class="mt-2">Ưu đãi</h5>
						</div>
						<div class="">
							<?php echo $goicuoc_ht["MoTa"] ?>
						</div>
					</div>
					<a style="background-color:#EE234E; color:white;" class="btn pl-5 pr-5 js-show-modal1" href="">Đăng ký</a>
					<!----> <!---->
					<!-- <div class="flex-w flex-t p-t-16">
						<span class="size-216 stext-116 cl8 p-t-4">
							Tags
						</span>

						<div class="flex-w size-217">
							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Streetstyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Crafts
							</a>
						</div>
					</div> -->

					<!--  -->
				</div>
			</div>
			<div class="col-md-4 col-lg-3 p-b-80">
				<div class="side-menu">
					<div class="p-t-55">
						<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-112 cl2 p-b-33">
							Danh Mục
						</h4>
						<ul>
							<li class="bor18">
								<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=sim" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Sim
								</a>
							</li>
							<li class="bor18">
								<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=goicuoc" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Gói cước
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include("inc/bottom.php") ?>