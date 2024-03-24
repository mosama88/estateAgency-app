
@extends('layouts.front.app')
@section('content')

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    أتصل بنا
                  </li>
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">الرئيسية</a>
                </li>
              </ol>
            </nav>
          </div>


          <div class="col-md-12 col-lg-8" dir="rtl">
            <div class="title-single-box">
              <h1 class="title-single">أتصل بنا</h1>
              <span class="color-text-a">سجل بياناتك لنقوم بالاتصال بك

                .</span>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="contact-map box">
              <div id="map" class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="col-sm-12 section-t8">
              <div class="row" dir="rtl">
                  <div class="col-md-7">
                      <form action="{{ route('front.contacts.store') }}" method="POST" >
                        @csrf
                        @if(session('success')!=null)
                            <h4 class="alert alert-success text-center">
                                {{session('success')}}
                            </h4>
                        @endif
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="الاسم رباعى">
@error('name')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="البريد الالكترونى">
@error('email')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <div class="form-group">
                        <input type="text" name="subject" class="form-control form-control-lg form-control-a" placeholder="الموضوع">
@error('subject')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="رسالة"></textarea>
@error('message')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
                      </div>
                    </div>

                    <div class="col-md-12 my-4 text-center">
                      <button type="submit" class="btn btn-a">أرسل رسالة</button>
                    </div>
                  </div>
                </form>
              </div>
              @foreach ($setting as $settings)

              <div class="col-md-5 section-md-t3">
                  <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                      <span class="bi bi-envelope"></span>
                    </div>
                  <div class="icon-box-content table-cell">
                      <div class="icon-box-title">
                          <h4 class="icon-title">راسلنا</h4>
                        </div>
                        <div class="icon-box-content">
                            <p class="mb-1">البريد الالكترونى.
                                <span class="color-a">{{ $settings->email }}</span>
                            </p>
                            <br>
                            <p class="mb-1">الموبايل.
                                <span class="color-a">{{ $settings->phone }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="bi bi-geo-alt"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">تجدنا في</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">
                        {{ $settings->address }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box">
                  <div class="icon-box-icon">
                    <span class="bi bi-share"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">التواصل الاجتماعى</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="{{ $settings->facebook }}" class="link-one">
                              <i class="bi bi-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="{{ $settings->twitter }}" class="link-one">
                              <i class="bi bi-twitter" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="{{ $settings->instagram }}" class="link-one">
                              <i class="bi bi-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="{{ $settings->linkedin }}" class="link-one">
                              <i class="bi bi-linkedin" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

  </main><!-- End #main -->



@endsection
