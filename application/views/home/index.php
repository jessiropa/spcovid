<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="<?= base_url('assets/home/')?>images/stethoscope.png" type="">

  <title> Sistem Pakar Covid-19 </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/home/')?>css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="<?= base_url('assets/home/')?>css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/home/')?>css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?= base_url('assets/home/')?>css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="<?= base_url('assets/home/')?>images/hero-bg.png" alt="">
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="<?= base_url('home')?>">
            <span>
              SISTEM PAKAR 
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('home')?>">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/informasi')?>">Informasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('login')?>">Konsultasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home/tentangkami')?>">Tentang Kami</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      SISTEM PAKAR 
                    </h1>
                    <h1>
                      DIAGNOSIS COVID-19
                    </h1>
                    <p>
                      <h5 class="text-white">Selamat datang di website sistem pakar diagnosis awal covid-19</h5>
                    </p>
                    <div class="btn-box">
                      <a href="<?= base_url('login')?>" class="btn1">
                        Konsultasi
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- department section -->

  <section class="department_section layout_padding">
    <div class="department_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Statistika <i>Covid-19</i>
          </h2>
          <p>
            Laporan kasus <i>covid-19</i> di Kota Kupang
          </p>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="<?= base_url('assets/home/')?>images/s3.png" alt="">
              </div>
              <div class="detail-box">
                <h1>
                    <b>22.397</b>
                </h1>
                <p>
                  Kasus Terkonfirmasi
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="<?= base_url('assets/home/')?>images/s4.png" alt=""> 
              </div>
              <div class="detail-box">
                <h1>
                  <b>21.167</b>
                </h1>
                <p>
                  Sembuh
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box ">
              <div class="img-box">
                <img src="<?= base_url('assets/home/')?>images/s2.png" alt="">
              </div>
              <div class="detail-box">
                <h1>
                  <b>355</b>
                </h1>
                <p>
                  Meninggal
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end department section -->

  <!-- doctor section -->

  <section class="cegah_section layout_padding">
    <div class="cegah_container">
      <div class="container">
        <div class="heading_container heading_center">
          <h2>
            Ayo Lindungi Diri Dari <i>Covid-19</i>
          </h2>
          <p class="col-md-10 mx-auto px-0">
            Lakukan beberapa hal ini untuk mencegah dan membantu menghentikan penyebaran <i>coronavirus</i>
          </p>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="<?= base_url('assets/home/')?>images/baatuk.png" alt="">
                <!-- <i class="fas fa-head-side-cough"></i> -->
              </div>
              <div class="detail-box">
                <h5>
                  Menutup Mulut & Hidung Saat Batuk
                </h5>
                <p class="text-white">
                  Tutuplah mulut dan hidung saat batuk maupun bersin menggunakan tissue. Buanglah tissue pada tempat sampah.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="<?= base_url('assets/home/')?>images/clean-hp.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Bersihkan Benda Yang Sering Disentuh
                </h5>
                <p class="text-white">
                  Bersihkan permukaan benda yang sering disentuh.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="<?= base_url('assets/home/')?>images/pake-masker.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Gunakan Masker & Menjaga Jarak
                </h5>
                <p class="text-white">
                  Gunakan masker jika anda sakit dan tetaplah tinggal dalam rumah serta segera memeriksakan diri ke fasilitas kesehatan terdekat. Jika anda keluar rumah wajib menggunakan masker dan menjaga jarak.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="<?= base_url('assets/home/')?>images/bersihkan-tangan.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Cuci Tangan
                </h5>
                <p class="text-white">
                  Cuci tangan dengan sabun menggunakan sabun pada air mengalir minimal 20 menit atau menggunakan <i>Hand Sanitizer</i> Berbasis Alkohol Minimal 60%.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="btn-box">
          <a href="">
            View All
          </a>
        </div> -->
      </div>
    </div>
  </section>

  <!-- end doctor section -->

  <!-- client section -->

  <!-- end client section -->

