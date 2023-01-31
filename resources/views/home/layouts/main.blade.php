<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RAKOR KOMINFO 2023 | {{ $pageTitle }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/logo-kota-kupang.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/css/variables.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>


    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <nav id="navbar" class="navbar">
                <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                    <img src="/assets/img/logo-kota-kupang.png" class="img-fluid" alt="">
                    <h1>RAKOR <span>Kominfo.</span></h1>
                </a>
                <ul>
                    <li><a class="nav-link scrollto" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/kegiatan">Kegiatan</a></li>
                    <li><a href="/#galeri">Galeri</a></li>

                    {{-- <li><a class="nav-link scrollto" href="/artikel">Artikel</a></li> --}}
                    <div class="dropdown">
                        <a class="nav-link scrollto" type="#" id="dropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Spot Kota Kupang
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="/faskes">Kesehatan <i class="bi bi-heart-pulse"></i></a>
                            </li>
                            <li><a class="dropdown-item" href="/wisata">Wisata <i
                                        class="bi bi-play-circle-fill"></i></a></li>
                            <li><a class="dropdown-item" href="/hotel">Hotel <i class="bi bi-building"></i></a>
                            </li>
                            <li><a class="dropdown-item" href="/restoran">Restoran <i class="bi bi-cup-straw"></i></a>
                            </li>
                            <li><a class="dropdown-item" href="/pusper">Perbelanjaan <i class="bi bi-basket"></i></a>
                            </li>

                        </ul>
                    </div>

                    <li><a class="nav-link scrollto" href="/contact">Kontak</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav>
            <a class="scrollto" href="#"></a>
        </div>
    </header>

    @yield('isi')

    <footer id="footer" class="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-info">
                            <h3>RAKOR Kominfo</h3>
                            <p><i class="bi bi-geo-alt-fill"></i>
                                Kantor Walikota Kupang</p>
                            <p>
                                Jl. S. K. Lerik No.1, Klp. Lima, Kec. Klp. Lima, Kota Kupang, Nusa Tenggara Tim.
                                85228<br> <a href="mailto:kominfo@kupangkota.go.id"
                                    class="text-white">kominfo@kupangkota.go.id</a><br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 footer-newsletter">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.327057338288!2d123.61736141444075!3d-10.154047892745647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c5683a80e62f69b%3A0x2f6997c3984f527!2sKantor%20Walikota%20Kupang!5e0!3m2!1sid!2sid!4v1654256740830!5m2!1sid!2sid"
                            width="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; <strong><span>RAKOR Kominfo </span>&copy; 2023</strong>
                    </div>
                    <div class="credits">
                        Made with (ヘ･_･)ヘ┳━┳ <b>→</b> (╯°□°）╯︵ ┻━┻ by <img src="/assets/img/diskominfo.png"
                            style="width: 80px;" alt="">
                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="https://www.facebook.com/Pemerintah-Kota-Kupang-105221008197416/" class="facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/pemkotkupang/" class="instagram"><i
                            class="bi bi-instagram"></i></a>
                </div>

            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>


</body>

<script>
    window.addEventListener("DOMContentLoaded", function() {
        const swiper = new Swiper(".swiper", {
            // Optional parameters
            direction: "horizontal",
            speed: 800,
            parallax: true,

            // If we need pagination
            pagination: {
                el: ".swiper-pagination-bull",
                type: "bullets",
                bulletClass: "bull",
                bulletActiveClass: "bull-active",
                clickable: true
            },

            navigation: {
                nextEl: ".swiper-button__next",
                prevEl: ".swiper-button__prev"
            }
        });


        /* Аккордеон */

        $(function() {
            $(".accordion").accordion({
                collapsible: true,
                animate: 300,
                icons: false,
            });
        });

        /* Аккордеон 2 */
        $(function() {
            $(".accordion__second").accordion({
                collapsible: true,
                animate: 300,
                icons: false,
            });
        });

        /* Аккордеон 3 */
        $(function() {
            $(".accordion__third").accordion({
                collapsible: true,
                animate: 300,
                icons: false,
            });
        });

        $(function() {
            $("#content-accordion").tabs({
                hide: {
                    effect: "slide",
                    direction: "up",
                    duration: 800
                }
            });
        });


        /* Бургер меню */

        document.querySelector('#burger').addEventListener('click', function() {
            document.querySelector('#nav-list').classList.add('nav-list__active');

            document.querySelector('.burger-closed').addEventListener('click', function() {
                document.querySelector('#nav-list').classList.remove('nav-list__active');
            });
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('.form-select').select2({
            theme: 'bootstrap-5'
        });
    });
</script>

</html>
