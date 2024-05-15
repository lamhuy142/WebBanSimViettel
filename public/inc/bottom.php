<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-301 cl0 p-b-30">
					Danh Mục Sim
				</h4>

				<ul>
					<li class="p-b-10">
						<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=sim" class="stext-107 cl7 hov-cl1 trans-04">
							Sim
						</a>
					</li>
					<li class="p-b-10">
						<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=goicuoc" class="stext-107 cl7 hov-cl1 trans-04">
							Gói cước
						</a>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-301 cl0 p-b-30">
					Hỗ Trợ
				</h4>

				<p style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-107 cl7 size-201">
					Thanh toán/ Nạp tiền
				</p>
				<p style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-107 cl7 size-201">
					Tra cứu Hóa đơn điện tử
				</p>
				<p style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-107 cl7 size-201">
					Nạp thẻ cào
				</p>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-301 cl0 p-b-30">
					Thông Tin Liên Lạc
				</h4>

				<p style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-107 cl7 size-201">
					Cơ quan chủ quản: Tổng Công ty Viễn thông Viettel (Viettel Telecom) - Chi nhánh Tập đoàn Công nghiệp - Viễn thông Quân đội. Mã số doanh nghiệp: 0100109106-011 do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp lần đầu ngày 18/07/2005, sửa đổi lần thứ 15 ngày 18/12/2018. Chịu trách nhiệm nội dung: Ông Cao Anh Sơn
				</p>

				<div class="p-t-27">
					<a href="https://www.facebook.com/vietteltelecom/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-facebook"></i>
					</a>

					<a href="https://www.youtube.com/user/Viettelchannels" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="bi bi-youtube"></i>
					</a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-301 cl0 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="wrap-input1 w-full p-b-4">
						<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
						<div class="focus-input1 trans-04"></div>
					</div>

					<div class="p-t-18">
						<button style="font-family: 'Tilt Neon', sans-serif !important;" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
							Subscribe
						</button>
					</div>
				</form>

				<!-- Thêm text vào phần này -->
				<div class="p-t-20">
					<p style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-107 cl7 size-201">Vui lòng nhập email của bạn để nhận thông tin và ưu đãi mới nhất từ chúng tôi.</p>
				</div>
				<!-- Kết thúc phần text được thêm vào -->
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
<!-- Hiển thị form đăng ký gói cước -->
<script>
	/*==================================================================
    [ Show modal1 ]*/
	$('.js-show-modal1').on('click', function(e) {
		e.preventDefault();
		$('.js-modal1').addClass('show-modal1');
	});

	$('.js-hide-modal1').on('click', function() {
		$('.js-modal1').removeClass('show-modal1');
	});
</script>
<div class="mwrap-modal1 wrap-modal1 js-modal1 p-t-60 p-b-20 ">
	<div class="overlay-modal1 js-hide-modal1"></div>
	<div class="container">
		<div style="padding-left:25px;" class="mbg bg0 p-t-30 p-b-30 p-lr-15-lg how-pos3-parent">
			<button class="how-pos3 hov3 trans-04 js-hide-modal1">
				<img src="../img/icons/icon-close.png" alt="CLOSE">
			</button>
			<div class="p-r-50 p-t-5 p-lr-0-lg">
				<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-105 cl2 js-name-detail p-b-14">
					Xác nhận mua gói cước
				</h4>
				<span style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-106 cl2">
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
								<a style="color:#44494D; background-color:#DEE6EE;" class="btn " href="index.php?action=macdinh">Đăng ký</a>
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

<!-- SLIDE--------------------------------------- -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
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
<!-- SEARCH=========================== -->
<script>
	// lọc trả trước trả sau
	document.addEventListener('DOMContentLoaded', function() {
		var filterLinks = document.querySelectorAll('.filter-link1');
		filterLinks.forEach(function(link) {
			// Gắn một sự kiện click cho mỗi phần tử filter-link1. Khi phần tử này được click, hàm callback được gọi.
			link.addEventListener('click', function(e) {
				e.preventDefault(); // ngăn chặn trình duyệt chuyển hướng đến URL
				//Lấy giá trị của thuộc tính data-type từ phần tử <a> được click. 
				var type = this.getAttribute('data-type');
				//Sử dụng API Fetch để gửi yêu cầu HTTP GET đến URL index.php?type=${type}, 
				//trong đó ${type} là giá trị của thuộc tính data-type từ phần tử <a> được click. 
				//Khi nhận được phản hồi từ server, nó sẽ chọn phần tử có id là #simTable từ nội dung HTML phản hồi.
				fetch(`index.php?type=${type} #simTable`)
					//Xử lý phản hồi từ server dưới dạng văn bản.
					.then(response => response.text())
					//Khi phản hồi đã được chuyển thành văn bản, nó sẽ tiếp tục xử lý dữ liệu văn bản này.
					.then(html => {
						//: Tạo một đối tượng DOMParser và sử dụng nó để phân tích chuỗi văn bản HTML thành một tài liệu HTML DOM.
						var parser = new DOMParser();
						var doc = parser.parseFromString(html, 'text/html');
						//Tìm phần tử có id là #simTable trong tài liệu HTML mới.
						var newTable = doc.querySelector('#simTable');
						//Thay đổi nội dung của phần tử có id là #simTable trong tài liệu HTML hiện tại bằng nội dung của phần tử tìm thấy trong tài liệu HTML mới.
						document.querySelector('#simTable').innerHTML = newTable.innerHTML;
					})
					//Bắt lỗi nếu có bất kỳ lỗi nào xảy ra trong quá trình này và in ra nó trong console của trình duyệt.
					.catch(err => console.log(err));
			});
		});
	});
</script>

</body>

</html>