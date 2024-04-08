	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Danh Mục Sim
					</h4>

					<ul>
						<?php foreach ($loaisim as $ls) { ?>
							<li class="p-b-10">
								<a href="index.php?action=dstheoloaisim" class="stext-107 cl7 hov-cl1 trans-04">
									<?php echo $ls["TenLS"] ?>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Hỗ Trợ
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Thông Tin Liên Lạc
					</h4>

					<p class="stext-107 cl7 size-201">
						Có câu hỏi nào không? Hãy cho chúng tôi biết tại cửa hàng tại tầng 8, 379 Hudson St, New York, NY 10018 hoặc gọi cho chúng tôi theo số 0111222333
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="./images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="./images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="./images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="./images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="./images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<!-- hiện modal theo thông tin gói cước chưa được -->
	<!-- <div id="goi-cuoc-data" style="display: none;">
		<php foreach ($goicuoc as $gc) : ?>
			<div class="goi-cuoc" data-ma-goi-cuoc="<php echo $gc['MaGC']; ?>">
				<h4 class="ten"><php echo $gc['Ten']; ?></h4>
				<span class="gia"><php echo number_format($gc['Gia']); ?></span>
				<p class="mo-ta"><php echo $gc['MoTa']; ?></p>
			</div>
		<php endforeach; ?>
	</div> -->
	<div class="mwrap-modal1 wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div style="padding-left:25px;" class="mbg bg0 p-t-30 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="./images/icons/icon-close.png" alt="CLOSE">
				</button>


				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						Xác nhận mua gói cước
					</h4>
					<span class="mtext-106 cl2">
						Nhập số điện thoại muốn đăng ký gói cước
					</span>
					<input class="form-control mt-2" type="text" name="sdt" placeholder="Số điện thoại">

					<!--  -->
					<div class="flex-w flex-r-m p-b-10 p-t-10">
						<div class="size-204 flex-w flex-m respon6-next">
							<div class="row justify-content-end">
								<div class="col-md-6">
									<a style="background-color:light; border:1px solid black;" class="text-dark btn js-hide-modal1">Hủy</a>
								</div>
								<div class="col-md-6">
									<a style="color:#44494D; background-color:#DEE6EE;" class="btn " href="index.php?action=dangkygoicuoc">Đăng ký</a>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
	<style>
		.mwrap-modal1 {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			z-index: 9999;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.mbg {
			width: 100%;
			max-width: 600px;
			/* Giới hạn chiều rộng tối đa của modal */
			margin: auto;
			/* Căn giữa modal trên màn hình */
			border-radius: 10px;
			padding: 20px;
		}
	</style>

	<!--====================================login===========================================================-->
	<script src="../../admin/inc/js/sb-admin-2.min.js"></script>

	<!--===============================================================================================-->
	<script src="./assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/bootstrap/js/popper.js"></script>
	<script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<!-- Thư viện jquery -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function() {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function() {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function() {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function() {
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	</script>
	<!--===============================================================================================-->
	<script src="./assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	<script src="./assets/js/main.js"></script>

	<!-- <script>
		// Hàm để hiển thị hoặc ẩn các sim dựa trên lựa chọn trả trước hoặc trả sau
		function filterSim(type) {
			// Lặp qua tất cả các sim
			var simItems = document.querySelectorAll('.tab-pane');
			simItems.forEach(function(item) {
				// Lấy ra loại của sim (trả trước hoặc trả sau) từ attribute data-type
				var simType = item.getAttribute('data-type');
				// Nếu loại sim không khớp với lựa chọn của người dùng, ẩn sim đó
				if (type !== 'all' && type !== simType) {
					item.style.display = 'none';
				} else {
					// Nếu loại sim khớp với lựa chọn của người dùng, hiển thị sim đó
					item.style.display = 'block';
				}
			});
		}

		// Lắng nghe sự kiện khi người dùng thay đổi lựa chọn trả trước hoặc trả sau
		var radioOptions = document.querySelectorAll('input[name="inlineRadioOptions"]');
		radioOptions.forEach(function(option) {
			option.addEventListener('change', function() {
				var type = this.value; // Lấy ra giá trị của lựa chọn (trả trước hoặc trả sau)
				filterSim(type); // Gọi hàm để lọc và hiển thị các sim phù hợp với lựa chọn
			});
		});

		// Hiển thị tất cả các sim khi trang được tải lần đầu
		filterSim('all');
	</script> -->
	<!-- SEARCH=========================== -->
	<script>
		// lọc trả trước trả sau
		document.addEventListener('DOMContentLoaded', function() {
			var filterLinks = document.querySelectorAll('.filter-link');
			filterLinks.forEach(function(link) {
				link.addEventListener('click', function(e) {
					e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
					var type = this.getAttribute('data-type');
					fetch(`index.php?type=${type} #simTable`)
						.then(response => response.text())
						.then(html => {
							var parser = new DOMParser();
							var doc = parser.parseFromString(html, 'text/html');
							var newTable = doc.querySelector('#simTable');
							document.querySelector('#simTable').innerHTML = newTable.innerHTML;
						})
						.catch(err => console.log(err));
				});
			});
		});
	</script>
	<!-- <script>
		// lọc trả trước trả sau
		document.addEventListener('DOMContentLoaded', function() {
			var filterLinks = document.querySelectorAll('.filter-link');
			filterLinks.forEach(function(link) {
				link.addEventListener('click', function(e) {
					e.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>
					var type = this.getAttribute('data-type');
					fetch(`index.php?type=${type} #simTable1`)
						.then(response => response.text())
						.then(html => {
							var parser = new DOMParser();
							var doc = parser.parseFromString(html, 'text/html');
							var newTable = doc.querySelector('#simTable1');
							document.querySelector('#simTable1').innerHTML = newTable.innerHTML;
						})
						.catch(err => console.log(err));
				});
			});
		});
	</script> -->

	</body>

	</html>