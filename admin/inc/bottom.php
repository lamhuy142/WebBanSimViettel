<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../../admin/inc/vendor/jquery/jquery.min.js"></script>

<script src="../../admin/inc/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../admin/inc/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../admin/inc/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../admin/inc/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../admin/inc/js/demo/chart-area-demo.js"></script>
<script src="../../admin/inc/js/demo/chart-pie-demo.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    // document.getElementById("txtMaDH").addEventListener("input", function() {
    //     var maDH = document.getElementById("txtMaDH").value;
    //     // Gửi yêu cầu Ajax để tìm kiếm đơn hàng dựa trên mã đơn hàng
    //     var xhr = new XMLHttpRequest();
    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState == 4 && xhr.status == 200) {
    //             // Xử lý dữ liệu trả về (ví dụ: cập nhật nội dung trang)
    //             document.getElementById("result").innerHTML = xhr.responseText;
    //         }
    //     };
    //     xhr.open("GET", "index.php?action=xem&txtMaDH=" + maDH, true);
    //     xhr.send();
    // });
</script>

</body>

</html>