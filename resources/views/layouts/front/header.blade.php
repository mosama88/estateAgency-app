<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency - الصفحه الرئيسية</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('front') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('front') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  {{-- Arabic Font --}}
  <link href="{{ asset('front') }}/assets/fonts/stylesheet.css" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="{{ asset('front') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('front') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('front') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('front') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('front') }}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->

<x-search-property-front></x-search-property-front>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top" dir="rtl">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{ url('/') }}">Estate<span class="color-b">Agency</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item {{request()->is('/')? 'active' : ''}}">
            <a class="nav-link" href="{{ url('/') }}">الرئيسية</a>
          </li>

          <li class="nav-item {{request()->is('previous-projects')? 'active' : ''}}">
            <a class="nav-link"  href="{{ route('front.previous-projects') }}">سابقة الأعمال</a>
          </li>

          <li class="nav-item {{request()->is('current-projects')? 'active' : ''}}">
            <a class="nav-link" href="{{ route('front.current-projects') }}">المشروعات الحاليه</a>
          </li>





          <li class="nav-item {{request()->is('abouts')? 'active' : ''}}">
            <a class="nav-link " href="{{ route('front.abouts') }}">من نحن</a>
          </li>

          <li class="nav-item {{request()->is('contacts')? 'active' : ''}}">
            <a class="nav-link " href="{{ route('front.contacts.index') }}">أتصل بنا</a>
          </li>

        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
  </nav><!-- End Header/Navbar -->
