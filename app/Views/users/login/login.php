<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lab-or - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="script/style.css">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background: url(<?= base_url('/images/fasilitas/logo.png') ?>);/* background-attachment: inherit; */background-position: center; background-size:cover;">
                                <!-- <img src="img/loginbg.png" style="width:100%;height: 100%;"> -->
                            </div>
                            <div class=" col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SIGN IN</h1>
                                        <?php if (session()->getFlashdata('pesan') != '') { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('pesan'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if (session()->getFlashdata('suksesregis')) { ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= session()->getFlashdata('suksesregis'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <form id="form" class="user validate-form" method="post" action="check" enctype="multipart/form-data">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <!-- <span class="far fa-user"></span> -->
                                            <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <!-- <span class="fas fa-key"></span> -->
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/forgot-password">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>