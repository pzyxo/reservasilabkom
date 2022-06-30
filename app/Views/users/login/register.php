<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar jadi Lab-or</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">


</head>

<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background: url(<?= base_url('/images/fasilitas/logo.png') ?>);background-position: center;background-size: cover;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Gabung dengan Lab-or!</h1>
                            </div>
                            <form class="user" id="form" action="user/register" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" id="nd" name="namadepan" class="form-control form-control-user" placeholder="Nama Depan" />
                                        <div class="invalid-feedback" id="errornd"></div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" id="nb" name="namabelakang" class="form-control form-control-user" placeholder="Nama Belakang" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="em" name="email" class="form-control form-control-user" placeholder="Alamat E-mail" />
                                    <div class="invalid-feedback" id="errorem"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" id="pw" name="password" class="form-control form-control-user" placeholder="Password" />
                                        <div class="invalid-feedback" id="errorpw"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" id="pw2" name="password2" class="form-control form-control-user" placeholder="Konfirmasi Password" />
                                        <div class="invalid-feedback" id="errorpw2"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="civitas" class="form-control" placeholder="Pilih Civitas" style="
                                        font-size: .8rem;
                                        /* padding: -3.5rem; */
                                        border-radius: 10rem;
                                        /* padding: 1.5rem 1rem; */
                                        height: 3rem;
                                    ">
                                        <option selected disabled>Pilih Civitas</option>
                                        <option value="UNS">UNS</option>
                                        <option value="non-UNS">NON-UNS</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="alamat" id="al" placeholder="Your Address">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" id="tp" name="telepon" class="form-control form-control-user" placeholder="No. Telepon" />
                                        <div class="invalid-feedback" id="errortp"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="file" id="pp" name="avatar" class="form-control" />
                                            <div class="invalid-feedback" id="errorpp"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            Foto Profil
                                        </div>

                                    </div>

                                </div>
                                <button type="submit" id="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="/signin">Already have an account? Login!</a>
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

    <!-- Custom script sweetalert yang semanis diriquh -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.error) {
                            if (response.error.namadepan) {
                                $('#nd').addClass('is-invalid');
                                $('#errornd').html(response.error.namadepan);
                            } else {
                                $('#nd').removeClass('is-invalid');
                                $('#errornd').html('');
                            }
                        }
                        if (response.error) {
                            if (response.error.telepon) {
                                $('#tp').addClass('is-invalid');
                                $('#errortp').html(response.error.telepon);
                            } else {
                                $('#tp').removeClass('is-invalid');
                                $('#errortp').html('');
                            }
                        }
                        if (response.error) {
                            if (response.error.email) {
                                $('#em').addClass('is-invalid');
                                $('#errorem').html(response.error.email);
                            } else {
                                $('#nd').removeClass('is-invalid');
                                $('#errorem').html('');
                            }
                        }
                        if (response.error) {
                            if (response.error.username) {
                                $('#username').addClass('is-invalid');
                                $('#errorun').html(response.error.username);
                            } else {
                                $('#username').removeClass('is-invalid');
                                $('#errorun').html('');
                            }
                        }
                        if (response.error) {
                            if (response.error.password) {
                                $('#pw').addClass('is-invalid');
                                $('#errorpw').html(response.error.password);
                            } else {
                                $('#pw').removeClass('is-invalid');
                                $('#errorpw').html('');
                            }
                        }
                        if (response.error) {
                            if (response.error.password2) {
                                $('#pw2').addClass('is-invalid');
                                $('#errorpw2').html(response.error.password2);
                            } else {
                                $('#pw2').removeClass('is-invalid');
                                $('#errorpw2').html('');
                            }
                        }
                        if (response.error) {
                            if (response.error.avatar) {
                                $('#pp').addClass('is-invalid');
                                $('#errorpp').html(response.error.avatar);
                            } else {
                                $('#pp').removeClass('is-invalid');
                                $('#errorpp').html('');
                            }
                        } else {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Lanjut login yuk',
                                icon: 'success',
                                confirmButton: 'Kuy'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = '<?= base_url('/signin') ?>';
                                }
                            })
                        }

                    },
                });
            });
        });
    </script>

</body>

</html>