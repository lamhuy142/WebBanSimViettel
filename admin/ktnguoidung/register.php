<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng Ký</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/inc/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../admin/inc/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class=" col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo Tài Khoản!</h1>
                            </div>
                            <form class="user was-validated" method="post">
                                <div class="form-group ">
                                        <input type="text" class="form-control form-control-user has-validation" name="txthoten" id="exampleFirstName" placeholder="Họ tên" required>
                                        <div class="valid-feedback">Hợp lệ.</div>
                                        <div class="invalid-feedback">Điền đầy đủ họ tên.</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user has-validation" name="sdt" id="exampleFirstName" placeholder="Số điện thoại" required>
                                        <div class="valid-feedback">Hợp lệ.</div>
                                        <div class="invalid-feedback">Điền số điện thoại.</div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user has-validation" name="txtdiachi" placeholder="Địa chỉ" required>
                                        <div class="valid-feedback">Hợp lệ.</div>
                                        <div class="invalid-feedback">Hãy nhập địa chỉ.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user has-validation" name="txttendn" placeholder="Tên đăng nhập" required>
                                    <div class="valid-feedback">Hợp lệ.</div>
                                    <div class="invalid-feedback">Vui lòng nhập tên đăng nhập.</div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="txtmk" id="exampleInputPassword" placeholder="Mật khẩu" required>
                                        <div class="valid-feedback">Hợp lệ.</div>
                                        <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="txtnhaplaimk" id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu" required>
                                        <div class="valid-feedback">Hợp lệ.</div>
                                        <div class="invalid-feedback">Vui lòng xác nhận mật khẩu.</div>
                                    </div>
                                </div>
                                <a href="index.php?action=xulydangky" class="btn btn-primary btn-user btn-block">
                                    Đăng Ký
                                </a>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Đăng ký với Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Đăng ký với Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin/inc/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/inc/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/inc/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/inc/js/sb-admin-2.min.js"></script>

</body>

</html>