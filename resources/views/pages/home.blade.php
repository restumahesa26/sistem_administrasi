<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Administrasi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('logo-unib.png') }}" rel="icon">
  <link href="{{ url('logo-unib.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('frontend/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.7.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <img src="{{ url('logo-unib.png') }}" alt="" srcset="" style="width: 50px">
      <h1 class="logo me-auto">
        <a href="{{ route('home') }}" style="text-transform: capitalize;">
          Program Studi Sistem Informasi
        </a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('home') }}">Home</a></li>
          @if (Auth::user())
          <li><a class="nav-link scrollto active" href="{{ route('dashboard') }}">Dashboard</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="getstarted scrollto" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                </a>
            </form>
          </li>
          @else
          <li>
            <a class="getstarted scrollto" href="{{ route('login') }}">Login</a>
          </li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Selamat Datang di</h1>
          <h2>Sistem Administrasi Skripsi Prodi Sistem Informasi</h2>
          @if (!Auth::user())
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a>
          </div>
          @endif
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ url('frontend/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ url('frontend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('frontend/assets/js/main.js') }}"></script>

</body>

</html>
