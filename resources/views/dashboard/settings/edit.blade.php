@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
تعديل إعدادات الموقع
@endsection

@section('page-title-name')
تعديل إعدادات الموقع
@endsection


<div class="container-fluid my-5">
<div class="row ">

    <div class="col-lg-12 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                </blockquote>
                <form action="{{route('dashboard.settings.update' , $setting->id)}}" method="POST">
                   @csrf
                   @method('PUT')

                    {{-- Email Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">البريد الالكترونى</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="email" placeholder="البريد الالكترونى" value="{{ $setting->email }}" id="example-text-input">
    
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    {{-- Mobile Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">الموبايل</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="phone" placeholder="الموبايل" value="{{ $setting->phone }}" id="example-text-input">
    
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    {{-- Address Input --}}
                    <div class="mb-3">
                    <label class="col-sm-5 col-form-label">العنوان</label>
                        <textarea  class="form-control" name="address" maxlength="1500" rows="2" placeholder="أضف الوصف">{{ $setting->address }}</textarea>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- description Input --}}
                    <div class="mb-3">
                        <label class="col-sm-5 col-form-label">الوصف</label>
                        <textarea  class="form-control" name="description" maxlength="1500" rows="5" placeholder="أضف الوصف">{{ $setting->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    {{-- Facebook Input --}}
                    <div class="mb-3">
                        <label for="example-url-input" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="url" name="facebook" value="{{ $setting->facebook }}" placeholder="https://facebook.com" id="example-url-input">
                        @error('facebook')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    {{-- Instgram Input --}}
                    <div class="mb-3">
                        <label for="example-url-input" class="col-sm-2 col-form-label">Instgram</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="url" name="instgram" value="{{ $setting->instgram }}" placeholder="https://instgram.com" id="example-url-input">
                        @error('instgram')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    {{-- Linkedin Input --}}
                    <div class="mb-3">
                        <label for="example-url-input" class="col-sm-2 col-form-label">Linkedin</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="url" name="linkedin" value="{{ $setting->linkedin }}" placeholder="https://linkedin.com" id="example-url-input">
                        @error('linkedin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

                    {{-- Twitter Input --}}
                    <div class="mb-3">
                        <label for="example-url-input" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="url" name="twitter" value="{{ $setting->twitter }}" placeholder="https://twitter.com" id="example-url-input">
                        @error('twitter')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>

               <div class="col-12">
                   <input class="btn btn-primary" type="submit" value="تعديل">
                   <a class="btn btn-primary" href="{{ route('dashboard.settings.index') }}">الرجوع الى صفحة الإعدادات</a>
               </div>
           </form>

       </div>
   </div>
</div>
</div>
</div>


@endsection