<?php include("inc/top.php") ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="index.php?action=blog" class="stext-109 cl8 hov-cl1 trans-04">
			Blog
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			<?php echo $khuyenmai_ht["TenKM"] ?>
		</span>
	</div>
</div>


<!-- Content page -->
<section class="bg0 p-t-52 p-b-20">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<!--  -->
					<div class=" how-pos5-parent">
						<img class="img-thumnail rounded " width="394px" height="394px" src="../img/khuyenmai/<?php echo $khuyenmai_ht['HinhAnh']; ?>" alt="<?php echo $khuyenmai_ht['HinhAnh']; ?>">
					</div>

					<div class="p-t-32">
						<span class="flex-w flex-m stext-111 cl2 p-b-19">
							<span>
								<?php foreach ($khuyenmai as $km) :
									foreach ($nguoidung as $nd) :
										if ($nd["MaND"] == $km["MaND"]) {
								?>
											<span class="cl4">By</span> <?php echo $nd['HoTen']; ?>
								<?php }
									endforeach;
								endforeach;
								?>
								<span class="cl12 m-l-4 m-r-6">|</span>
							</span>

							<span>
								<?php echo $khuyenmai_ht['NgayTao']; ?>
								<span class="cl12 m-l-4 m-r-6">|</span>
							</span>

							<span>
								<?php $tong = 0;

								// Duyệt qua danh sách đánh giá
								foreach ($danhgia as $dg) :
									// Kiểm tra xem đánh giá có cùng MaKM với $km không
									if ($dg["MaKM"] == $khuyenmai_ht["MaKM"]) {
										// Nếu có, tăng biến đếm lên 1
										$tong++;
									}
								endforeach;
								?>

								<!-- Hiển thị tổng số lượng đánh giá -->
								<?php echo $tong; ?> Đánh giá
							</span>
						</span>

						<h4 class="ltext-109 cl2 p-b-28">
							<?php echo $khuyenmai_ht['TenKM']; ?>
						</h4>

						<p class="stext-117 cl6 p-b-26">
							<?php echo $khuyenmai_ht['MoTa']; ?>
						</p>
					</div>

					<div class="flex-w flex-t p-t-16">
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
					</div>

					<!--  -->
					<div class="p-t-40">
						<h5 class="mtext-113 cl2 p-b-12">
							Bình luận
						</h5>
						<form method="post">
							<input type="hidden" name="action" value="danhgia">
							<input type="hidden" name="MaKM" value="<?php echo $khuyenmai_ht['MaKM']; ?>">
							<div class="bor19 m-b-20">
								<textarea class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="danhgia" placeholder="Bình luận..."></textarea>
							</div>
							<input type="submit" class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04" value="Đánh giá"></input>
						</form>

						<!-- HIỂN THỊ BÌNH LUẬN -->

						<!-- <div class="card-body">
									<php foreach ($danhgia as $dg) :
										foreach ($nguoidung as $nd) :
											if ($dg["MaKM"] == $khuyenmai_ht["MaKM"] && $dg["MaND"] == $nd["MaND"]) :
									?>
												<div class="media mb-3" style="margin-top:50px;">
													<img src="../img/user/<php echo $nd['HinhAnh']; ?>" class="mr-3 rounded-circle" alt="Ảnh đại diện" style="width: 64px; height: 64px;">
													<div class="media-body">
														<h6 class="mt-0"><php echo $nd['HoTen']; ?></h6>
														<p class="mb-0"><php echo $dg['NoiDung']; ?></p>
														<small class="text-muted"><php echo $dg['NgayDG']; ?></small>
													</div>
												</div>
									<php
											endif;
										endforeach;
									endforeach;
									?>
								</div> -->
						<div style="margin-top: 50px;">
							<?php foreach ($danhgia as $dg) :
								foreach ($nguoidung as $nd) :
									if ($dg["MaKM"] == $khuyenmai_ht["MaKM"] && $dg["MaND"] == $nd["MaND"]) : ?>
										<div style="margin-top: 20px; padding:30px; border:0.5px dashed #E1E3EA;" class="rounded-3  border-gray-300 w-100 p-7 p-lg-10 mb-10">
											<div class="w-100 d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<!--begin::Author-->
													<div class="symbol symbol-35px me-3">
														<img class="symbol-label img-thumnail rounded-3" width="57px" height="64px" src="../img/user/<?php echo $nd['HinhAnh']; ?>" alt="">
														<!-- <div class="symbol-label" style="background-image:url('../img/user/<php echo $nd['HinhAnh']; ?>')"></div> -->
													</div>
													<!--end::Author-->

													<!--begin::Info-->
													<div class="d-flex flex-column">
														<!--begin::Text-->
														<div class="d-flex align-items-center">
															<!--begin::Username-->
															<span class="text-dark fw-bold fs-7 me-3 lh-1">
																<?php echo $nd['HoTen']; ?>
															</span>
															<!--end::Username-->
														</div>
														<!--end::Text-->

														<!--begin::Date-->
														<span class="text-gray-600 fw-semibold fs-8">
															<?php echo $dg['NgayDG']; ?>
														</span>
														<!--end::Date-->
													</div>
													<!--end::Info-->
												</div>
												<div class="m-0">
													<button class="btn p-0 text-gray-600 fw-semibold cursor-pointer fs-7 me-2" data-kt-action="reply">Trả lời</button>
												</div>
											</div>
											<p class="fw-normal fs-base text-gray-700 m-0 p-0" data-kt-element="comment-text" data-kt-original-text="Code tải về không giống demo">
												<?php echo $dg['NoiDung']; ?>
											</p>
											<div data-kt-element="comment-edit">
											</div>
										</div>
										<div id="kt_post_comment_81_wrapper" data-parent-id="81">

											<div class="ps-5 ps-lg-10 2">
												<!-- replies for the comment -->
											</div>

										</div>

							<?php
									endif;
								endforeach;
							endforeach;
							?>
						</div>






					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-3 p-b-80">
				<div class="side-menu">
					<div class="bor17 of-hidden pos-relative">
						<input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

						<button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
					</div>

					<div class="p-t-55">
						<h4 class="mtext-112 cl2 p-b-33">
							Categories
						</h4>

						<ul>
							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Fashion
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Beauty
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Street Style
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									Life Style
								</a>
							</li>

							<li class="bor18">
								<a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									DIY & Crafts
								</a>
							</li>
						</ul>
					</div>

					<div class="p-t-65">
						<h4 class="mtext-112 cl2 p-b-33">
							Featured Products
						</h4>

						<ul>
							<li class="flex-w flex-t p-b-30">
								<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
									<img src="images/product-min-01.jpg" alt="PRODUCT">
								</a>

								<div class="size-215 flex-col-t p-t-8">
									<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
										White Shirt With Pleat Detail Back
									</a>

									<span class="stext-116 cl6 p-t-20">
										$19.00
									</span>
								</div>
							</li>

							<li class="flex-w flex-t p-b-30">
								<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
									<img src="images/product-min-02.jpg" alt="PRODUCT">
								</a>

								<div class="size-215 flex-col-t p-t-8">
									<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
										Converse All Star Hi Black Canvas
									</a>

									<span class="stext-116 cl6 p-t-20">
										$39.00
									</span>
								</div>
							</li>

							<li class="flex-w flex-t p-b-30">
								<a href="#" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
									<img src="images/product-min-03.jpg" alt="PRODUCT">
								</a>

								<div class="size-215 flex-col-t p-t-8">
									<a href="#" class="stext-116 cl8 hov-cl1 trans-04">
										Nixon Porter Leather Watch In Tan
									</a>

									<span class="stext-116 cl6 p-t-20">
										$17.00
									</span>
								</div>
							</li>
						</ul>
					</div>

					<div class="p-t-55">
						<h4 class="mtext-112 cl2 p-b-20">
							Archive
						</h4>

						<ul>
							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										July 2018
									</span>

									<span>
										(9)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										June 2018
									</span>

									<span>
										(39)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										May 2018
									</span>

									<span>
										(29)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										April 2018
									</span>

									<span>
										(35)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										March 2018
									</span>

									<span>
										(22)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										February 2018
									</span>

									<span>
										(32)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										January 2018
									</span>

									<span>
										(21)
									</span>
								</a>
							</li>

							<li class="p-b-7">
								<a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
									<span>
										December 2017
									</span>

									<span>
										(26)
									</span>
								</a>
							</li>
						</ul>
					</div>

					<div class="p-t-50">
						<h4 class="mtext-112 cl2 p-b-27">
							Tags
						</h4>

						<div class="flex-w m-r--5">
							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Fashion
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Lifestyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Denim
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Streetstyle
							</a>

							<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
								Crafts
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include("inc/bottom.php") ?>