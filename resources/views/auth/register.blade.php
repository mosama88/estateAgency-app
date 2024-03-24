<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Register | Realestate Agancy - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('dashboard')}}/assets/images/favicon.ico">


        <!-- Bootstrap Css -->
        <link href="{{asset('dashboard')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('dashboard')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('dashboard')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    </head>

    <body>




@if(session('success')!=null)
<div class="alert alert-success text-center">
    {{session('success')}}
</div>
@endif


Errors


@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger text-center">
        {{$error}}
    </div>
@endforeach
@endif



        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card overflow-hidden">
                            <div class="bg-primary">
                                <div class="text-primary text-center p-4">
                                    <h5 class="text-white font-size-20">{{ __('Register') }}</h5>

                                    <p class="text-white-50">سجل الأن</p>
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="{{asset('dashboard')}}/assets/images/logo-sm.png" height="24" alt="logo">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <div class="p-3">
                                    <form class=" mt-4" method="POST" action="{{ route('register') }}">
                                        @csrf

                                    {{-- Full Name Input --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="name">الأسم بالكامل</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                        </div>

                                    {{-- Email Input --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="useremail">البريد الالكترونى</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    {{-- Password Input --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">كلمة المرور</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    {{-- Confirm Password Input --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">تأكيد كلمة المرور</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                        </div>

                                    {{-- Phone Input --}}
                                    <div class="mb-3">
                                        <label class="form-label" for="mobile"> الموبايل</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                        {{-- Department Input --}}
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label">أختر القسم</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" name="department_id" aria-label="Default select example">
                                                <option selected="" disabled>أختر من القائمة</option>
                                                    <option value="1">زائر</option>
                                            </select>
                                            @error('department_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    {{-- Register button --}}
                                        <div class="mb-3 row mt-4">
                                            <div class="col-12 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">{{ __('تسجيل') }}</button>
                                            </div>
                                        </div>

                                        <div class="mt-2 mb-0 row">
                                            <div class="col-12 mt-1">
                                                <p class="mb-0">من خلال التسجيل فإنك توافق على RealestateAgancy <a href="#" class="text-primary">شروط الاستخدام</a></p>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>

                        <div class="mt-5 text-center">
                            <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-primary"> Login </a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>

                <!-- JAVASCRIPT -->
                <script src="{{asset('dashboard')}}/assets/libs/jquery/jquery.min.js"></script>
                <script src="{{asset('dashboard')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="{{asset('dashboard')}}/assets/libs/metismenu/metisMenu.min.js"></script>
                <script src="{{asset('dashboard')}}/assets/libs/simplebar/simplebar.min.js"></script>
                <script src="{{asset('dashboard')}}/assets/libs/node-waves/waves.min.js"></script>


        <script src="{{asset('dashboard')}}/assets/js/app.js"></script>

    </body>
</html>
