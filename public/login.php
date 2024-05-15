<?php include("inc/top.php"); ?>
<body style="background-image: url(../img/gioithieu/headbg.png);background-size: cover; background-position: center;">
    <section class=" vh-50 ">
        <div class=" container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-50">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 ">
                            <form method="post">
                                <input type="hidden" name="action" value="xldangnhap">
                                <div class="mb-md-5 mt-md-3 pb-3">
                                    <h2 class="text-center fw-bold mb-2 text-uppercase">Đăng nhập</h2>
                                    <p class=" text-center text-white-50 mb-5">Vui lòng nhập mật khẩu của bạn!</p>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Tên đăng nhập</label>
                                        <input type="text" name="txtdangnhap" id="typeEmailX" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Mật khẩu</label>
                                        <input type="password" name="txtpassword" id="typePasswordX" class="form-control form-control-lg" />
                                    </div>

                                    <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->
                                    <div class="text-center">
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Đăng nhập</button>
                                    </div>
                                </div>
                            </form>

                            <div>
                                <p class="mb-0 text-center">Chưa có tài khoản? <a href="index.php?action=dangky" class="text-white-50 fw-bold">Đăng ký</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<?php include("inc/bottom.php"); ?>