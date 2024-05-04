<?php include("inc/top.php") ?>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
			Khuyến mãi
		</span>
	</div>
</div>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-5" style="background-image: url('images/bg-02.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Khuyến mãi
	</h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-62 p-b-60">
	<div class="container">
		<div class="row">
			<!-- style="max-height: 900px; overflow-y: auto;" -->
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<!-- item blog -->
					<?php foreach ($khuyenmai as $km) :
						foreach ($nguoidung as $nd) :

							if ($nd["MaND"] == $km["MaND"]) {
					?>
								<div class="p-b-63">
									<a href="index.php?action=detail&id=<?php echo $km['MaKM'] ?>" class="hov-img0 how-pos5-parent">
										<img class="img-thumbnail rounded" style="width:300px; height: 300px;" src="../img/khuyenmai/<?php echo $km["HinhAnh"]; ?>" alt="">

										<div class="flex-col-c-m size-123 bg9 how-pos5">
											<span style="font-family: 'Tilt Neon', sans-serif !important;" class="ltext-107 cl2 txt-center">
												<?php echo date('d', strtotime($km['NgayTao'])); ?>
											</span>

											<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl3 txt-center">
												<?php echo date('F Y', strtotime($km['NgayTao'])); ?>
											</span>
										</div>
									</a>

									<div class="p-t-32">
										<h4 class="p-b-15">
											<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=detail&id=<?php echo $km['MaKM'] ?>" class="ltext-108 cl2 hov-cl1 trans-04">
												<?php echo $km["TenKM"]; ?>
											</a>
										</h4>

										<p class="stext-117 cl6">
											<?php echo mb_substr($km["MoTa"], 0, 100) . "..."; ?> </p>

										<div class="flex-w flex-sb-m p-t-18">
											<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
												<span style="font-family: 'Tilt Neon', sans-serif !important;">
													<span class="cl4">By</span>
													<span class="cl12 m-l-4 m-r-6"><?php echo $nd['HoTen'] ?>|</span>
												</span>

												<span style="font-family: 'Tilt Neon', sans-serif !important;">
													<?php $tong = 0;

													// Duyệt qua danh sách đánh giá
													foreach ($danhgia as $dg) :
														// Kiểm tra xem đánh giá có cùng MaKM với $km không
														if ($dg["MaKM"] == $km["MaKM"]) {
															// Nếu có, tăng biến đếm lên 1
															$tong++;
														}
													endforeach;
													?>

													<!-- Hiển thị tổng số lượng đánh giá -->
													<?php echo $tong; ?> Đánh giá
												</span>
											</span>

											<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=detail&id=<?php echo $km['MaKM'] ?>" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
												Xem bài viết

												<i class="fa fa-long-arrow-right m-l-9"></i>
											</a>
										</div>
									</div>
								</div>
					<?php
							}
						endforeach;
					endforeach;

					?>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item">
							<a style="color:#212529 !important;" class="page-link" href="index.php?action=khuyenmai&trang=1" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $sotrang; $i++) { ?>
							<li class="page-item "><a style="color:#212529 !important;" class="page-link" href="index.php?action=khuyenmai&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php } ?>
						<li class="page-item">
							<a style="color:#212529 !important;" class="page-link" href="index.php?action=khuyenmai&trang=<?php echo $sotrang; ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
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