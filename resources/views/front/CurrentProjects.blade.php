
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
                        المشروعات الحالية

                      </li>
                    <li class="breadcrumb-item">
                      <a href="{{ url('/') }}">الرئيسية</a>
                    </li>

                  </ol>
                </nav>
              </div>
              
          <div class="col-md-12 col-lg-8" dir="rtl">
            <div class="title-single-box">
              <h1 class="title-single">المشروعات الحالية</h1>
              {{-- <span class="color-text-a">Grid News</span> --}}
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Intro Single-->


      
    <!-- =======  Blog Grid ======= -->
    <section class="news-grid grid">
      <div class="container">
        
        <div class="row">
          @foreach ($projects as $project)
          <div class="col-md-4">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="{{ $project->image() }}" style= "width:600px; height:400px" alt="" class="img-b img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-header-b">
                  <div class="card-category-b">
                    <a href="#" class="category-b">Travel</a>
                  </div>
                  <div class="card-title-b">
                    <h2 class="title-2">
                      <a href="{{ route('front.projecting.show' ,$project->id ) }}">{{ $project->name }}
                        <br> new</a>
                    </h2>
                  </div>
                  <div class="card-date">
                    <span class="date-b">{{ $project->created_at->format('Y') }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach


{{ $projects->links() }}

      </div>
    </section><!-- End Blog Grid-->

  </main><!-- End #main -->

  @endsection
