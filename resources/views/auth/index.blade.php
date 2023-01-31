<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="/admin/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="/admin/assets/img/favicon.ico" />
    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/admin/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link id="pagestyle" href="/admin/assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
</head>

<body class="">
    @if (session()->has('error'))
        <script>
            Swal.fire(
                'Login Gagal!',
                'Cek kembali email dan password anda!',
                'error'
            )
        </script>
    @endif
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <center>
                                        <img src="/assets/img/logo-diskominfo.png" width="300px" class="mb-4"
                                            alt="">
                                    </center>
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Masukkan email dan password anda</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="post" action="/auth">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="email" class="form-control form-control-lg"
                                                placeholder="Email" aria-label="Email" name="email" />
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password" name="password" />
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe" />
                                            <label class="form-check-label" for="rememberMe">Ingat saya</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">
                                                Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <p class="mb-2 position-relative opacity-7">
                            Copyright &copy; RAKOR {{ date('Y') }} | Made by <span style="color:blue"
                                class="opacity-5">DISKOMINFO
                                Dev Team</span>
                        </p>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 pr-2 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="
                    background-image: url('/admin/assets/img/sign-in.jpg');
                    background-size: cover;
                  ">

                                <span class="mask bg-gradient-dark opacity-6"></span>
                                <p class="text-white position-relative mt-auto text-end">
                                    <span class="text-end text-white" style="font-size: 23px">
                                        <b>RAKOR 2022</b>
                                    </span>
                                    <img src="/admin/assets/img/kp.png" width="80px" alt="">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="/admin/assets/js/core/popper.min.js"></script>
    <script src="/admin/assets/js/core/bootstrap.min.js"></script>
    <script src="/admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/admin/assets/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>

</html>
