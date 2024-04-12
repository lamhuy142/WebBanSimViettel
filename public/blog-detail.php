<?php include("inc/top.php") ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=khuyenmai" class="stext-109 cl8 hov-cl1 trans-04">
			Blog
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
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
							<span style="font-family: 'Tilt Neon', sans-serif !important;">
								<?php
								$hoten = '';
								foreach ($khuyenmai as $km) :
									foreach ($nguoidung as $nd) :
										if ($nd["MaND"] == $km["MaND"]) {
											$hoten = $nd['HoTen'];
										}
									endforeach;
								endforeach;
								?>
								<span style="font-family: 'Tilt Neon', sans-serif !important;" class="cl4">By</span> <?php echo $hoten; ?>
								<span class="cl12 m-l-4 m-r-6">|</span>
							</span>

							<span style="font-family: 'Tilt Neon', sans-serif !important;">
								<?php echo $khuyenmai_ht['NgayTao']; ?>
								<span class="cl12 m-l-4 m-r-6">|</span>
							</span>

							<span style="font-family: 'Tilt Neon', sans-serif !important;">
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

						<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="ltext-109 cl2 p-b-28">
							<?php echo $khuyenmai_ht['TenKM']; ?>
						</h4>

						<p style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-117 cl6 p-b-26">
							<?php echo $khuyenmai_ht['MoTa']; ?>
						</p>
					</div>

					<!--  -->
					<div class="p-t-40">
						<h5 style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-113 cl2 p-b-12">
							Bình luận
						</h5>
						<form method="post">
							<input type="hidden" name="action" value="danhgia">
							<input type="hidden" name="MaKM" value="<?php echo $khuyenmai_ht['MaKM']; ?>">
							<div class="bor19 m-b-20">
								<textarea style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="danhgia" placeholder="Bình luận..."></textarea>
							</div>
							<input style="font-family: 'Tilt Neon', sans-serif !important;" type="submit" class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04" value="Đánh giá"></input>
						</form>

						<!-- HIỂN THỊ BÌNH LUẬN -->
						<div style="margin-top: 50px;">
							<?php
							$i = 0;
							foreach ($danhgia as $dg) :
								foreach ($nguoidung as $nd) :
									if ($dg["MaKM"] == $khuyenmai_ht["MaKM"] && $dg["MaND"] == $nd["MaND"]) : ?>
										<div style="margin-top: 20px; padding:15px; border:0.5px dashed #E1E3EA;" class="rounded-3  border-gray-300 w-100 p-7 p-lg-10 mb-10">
											<div class="w-100 d-flex align-items-center justify-content-between mb-3">
												<div class="d-flex align-items-center">
													<!--begin::Author-->
													<div class="symbol symbol-35px me-3">
														<img class="symbol-label img-thumnail rounded-circle" width="57px" height="64px" src="../img/user/<?php echo $nd['HinhAnh']; ?>" alt="">
													</div>
													<!--end::Author-->

													<!--begin::Info-->
													<div class="d-flex flex-column">
														<!--begin::Text-->
														<div class="d-flex align-items-center">
															<!--begin::Username-->
															<span style="font-family: 'Tilt Neon', sans-serif !important;" class="text-dark fw-bold fs-12 me-3 lh-1">
																<?php echo $nd['HoTen']; ?>
															</span>
															<!--end::Username-->
														</div>
														<!--end::Text-->

														<!--begin::Date-->
														<span style="font-family: 'Tilt Neon', sans-serif !important;" class="text-gray-600 fw-semibold fs-10">
															<?php echo date('d-M-Y', strtotime($dg['NgayDG'])); ?>
														</span>
														<!--end::Date-->
													</div>
													<!--end::Info-->
												</div>
												<div class="m-0">
													<p>
														<?php if (isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["MaQ"] == 1) { ?>
															<a style="font-family: 'Tilt Neon', sans-serif !important;" style="color:#576C8F; background-color:#E7E7E7; padding: 10px ; " class="text-decoration-none rounded" data-bs-toggle="collapse" href="#<?php echo $i; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $i; ?>">
																Trả lời
															</a>
														<?php } ?>

													</p>
												</div>
											</div>
											<p style="font-family: 'Tilt Neon', sans-serif !important;" class="fw-normal fs-base text-gray-700 m-0 p-0" data-kt-element="comment-text">
												<?php echo $dg['NoiDung']; ?>
											</p>
										</div>
										<div class="collapse" id="<?php echo $i; ?>">
											<form method="post">
												<input type="hidden" name="action" value="traloidanhgia">
												<input type="hidden" name="MaDG" value="<?php echo $dg["MaDG"] ?>">
												<input type="hidden" name="MaKM" value="<?php echo $khuyenmai_ht["MaKM"] ?>">
												<input type="hidden" name="nguoiphanhoi" value="<?php echo $_SESSION["nguoidung"]["MaND"] ?>">
												<div style="border:0.5px groove #E1E3EA;" class="rounded bor19 m-b-20 m-t-20">
													<textarea style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-111 cl2 plh3 size-124 p-lr-18 p-tb-15" name="traloi" placeholder="Bình luận..."></textarea>
												</div>
												<p>
													<a style="font-family: 'Tilt Neon', sans-serif !important;" class="text-decoration-none btn btn-secondary m-l-2" data-bs-toggle="collapse" href="#<?php echo $i; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $i; ?>">
														Hủy
													</a>
													<input style="font-family: 'Tilt Neon', sans-serif !important;" style="color:#576C8F; background-color:#E7E7E7; border:1px solid #E7E7E7;" type="submit" value="Trả lời" class="text-decoration-none btn btn-secondary m-l-10" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?php echo $i; ?>">
												</p>
											</form>
										</div>

										<?php
										foreach ($traloidanhgia as $t) :
											foreach ($nguoidung as $nd_tl) :
												if ($t["MaDG"] == $dg["MaDG"] && $t["MaND"] == $nd_tl["MaND"]) {
										?>
													<!-- HIỂN THỊ TRẢ LỜI -->
													<div class="ms-5 ms-lg-10">
														<div id="kt_post_comment_96" data-kt-comment-id="96">
															<div style="padding-left: 7px !important;" class="rounded-3 border border-dashed border-gray-300 w-100 p-7 pl-7 p-lg-10 mb-10 mt-2">
																<div class="w-100 d-flex align-items-center justify-content-between mb-4">
																	<div class="d-flex align-items-center mt-2 ml-2 ">
																		<!--begin::Author-->
																		<div class="symbol symbol-35px me-3">
																			<img class="symbol-label img-thumnail rounded-circle" style="width: 20px; height:20px;" src="../img/logo/favicon.png" alt="">
																		</div>
																		<!--end::Author-->

																		<!--begin::Info-->
																		<div class="d-flex flex-column">
																			<!--begin::Text-->
																			<div class="d-flex align-items-center">
																				<!--begin::Username-->
																				<span style="font-family: 'Tilt Neon', sans-serif !important;" class="text-dark fw-bold fs-12 me-3 lh-1">
																					Viettel
																				</span>
																				<!--end::Username-->
																			</div>
																			<!--end::Text-->

																			<!--begin::Date-->
																			<span style="font-family: 'Tilt Neon', sans-serif !important;" class="text-gray-600 fw-semibold fs-10">
																				<?php echo date('d-M-Y', strtotime($t['NgayTL'])); ?>
																			</span>
																			<!--end::Date-->
																		</div>
																		<!--end::Info-->
																	</div>
																</div>
																<p class="fw-normal fs-base text-gray-700 m-2 p-0" data-kt-element="comment-text">
																	<?php echo $t['TraLoi']; ?>
																</p>
																<div data-kt-element="comment-edit"></div>
															</div>
															<div id="kt_post_comment_96_wrapper" data-parent-id="96">
																<div class="ps-5 ps-lg-10 2">
																	<!-- replies for the comment -->
																</div>
															</div>
														</div>
													</div>
										<?php
												}
											endforeach;
										endforeach;
										?>
							<?php
										$i++;
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
						<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-112 cl2 p-b-33">
							Danh Mục
						</h4>
						<ul>
							<?php foreach ($loaisim as $ls) { ?>
								<li class="bor18">
									<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=dstheoloaisim" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
										<?php echo $ls["TenLS"] ?>
									</a>
								</li>
							<?php } ?>
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