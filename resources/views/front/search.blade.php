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
                <li class="breadcrumb-item">
                    <a href="{{ route('front.properties.index') }}">كل الوحدات</a>
                  </li>
                <li class="breadcrumb-item">
                  <a href="{{ url('/') }}">الرئيسية</a>
                </li>
              </ol>
            </nav>
          </div>
          <div class="col-md-12 col-lg-8" dir="rtl">
            <div class="title-single-box">
              <h1 class="title-single">عقاراتنا المذهلة</h1>
              <span class="color-text-a">الوحدات المتاحه</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid-option">
              <form>
                <select class="custom-select">
                  <option selected>الكل</option>
                  <option value="1">الأحدث</option>
                  <option value="2">للإيجار</option>
                  <option value="3">للبيع</option>
                </select>
              </form>
            </div>
          </div>
    @if (count($properties) > 0)
          @foreach ($properties as $property)            
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{ asset($property->image_1) }}" style= "width:600px; height:400px" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay" dir="rtl">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="{{ route('front.properties.show', $property->id) }}">{{ Str::limit($property->title  , 15  ) }}
                        <br /> {{ Str::limit($property->address, 20) }}</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">{{ $property->status }} | جنيه {{ $property->price }}</span>
                    </div>
                    <a href="{{ route('front.properties.show', $property->id) }}" class="link-a">عرض الوحده
                      <span class="bi bi-chevron-left"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">المساحه</h4>
                        <span>{{ $property->space }} متر
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">الغرف</h4>
                        <span>{{ $property->room }}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">الحمامات</h4>
                        <span>{{ $property->Baths }}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">المطبخ</h4>
                        <span>{{ $property->Kitchen }}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @endforeach
        @else
                  <p>No results found.</p>
    @endif

        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->
@endsection