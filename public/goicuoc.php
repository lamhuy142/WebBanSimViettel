<?php include("inc/top.php");
$selectedOption = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : 'all';

?>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
			gói cước
		</span>
	</div>
</div>

<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-20">
			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>
			</div>
		</div>
		<section class="sec-product bg0 p-t-20 p-b-50">
			<div class="container">
				<div class="p-b-32">
					<h3 style="font-family: 'Tilt Neon', sans-serif !important;" style="font-family: 'Tilt Neon', sans-serif !important;" class="ltext-105 cl5 txt-center respon1">
						Gói Cước
					</h3>
				</div>


				<!-- Hiện gói  cước -->
				<div style="column-gap: 1rem; column-count: 4;" class="card-columns">
					<?php foreach ($goicuoc as $gc) : ?>
						<div style="margin-bottom: 1rem; " class="card mr-2 mb-2" style="width: 18rem;">
							<div class="block2-pic hov-img0">
								<!-- <h5 class="card-title"><php echo $gc["Ten"] ?></h5> -->
								<img class="card-img-top" src="../img/goicuoc/gc.png" alt="img">
								<a style="font-family: 'Tilt Neon', sans-serif !important;" style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=chitietgoicuoc&id=<?php echo $gc['MaGC'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 "> <!--js-show-modal1-->
									Xem chi tiết
								</a>
							</div>

							<div class="card-body">
								<h5 class="card-title"><?php echo $gc["Ten"] ?></h5>
								<p><?php echo number_format($gc["Gia"]); ?>đ</p>
								<a style="background-color:white; " class="border rounded btn js-show-modal1">Đăng ký</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<nav aria-label="Page navigation example" class="d-flex justify-content-center">
			<ul class="pagination">
				<li class="page-item">
					<a style="color:#212529 !important;" class="page-link" href="index.php?action=goicuoc&trang=1" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				<?php for ($i = 1; $i <= $sotrang; $i++) { ?>
					<li class="page-item "><a style="color:#212529 !important;" class="page-link" href="index.php?action=goicuoc&trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php } ?>
				<li class="page-item">
					<a style="color:#212529 !important;" class="page-link" href="index.php?action=goicuoc&trang=<?php echo $sotrang; ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>



<?php include("inc/bottom.php") ?>