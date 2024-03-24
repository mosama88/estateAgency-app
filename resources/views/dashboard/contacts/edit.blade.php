@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
تعديل بيانات الوحده
@endsection

@section('page-title-name')
تعديل معلومات الأتصال
@endsection


<div class="container-fluid my-5">
<div class="row ">

    <div class="col-lg-12 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                </blockquote>
                <form action="{{route('dashboard.contact.update' , $contact->id)}}" method="POST">
                   @csrf
                   @method('PUT')

                    {{-- Name Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">الأسم</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="name" placeholder="الأسم" value="{{  $contact->name}}" id="example-text-input">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Email Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">البريد الالكترونى</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="email" placeholder="البريد الالكترونى" value="{{  $contact->email}}" id="example-text-input">
    
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
    
                    
                    
                    {{-- Subject Input --}}
                    <div class="mb-3">
                    <label class="col-sm-5 col-form-label">الموضوع</label>
                        <textarea  class="form-control" name="subject" maxlength="1500" rows="2" placeholder="أضف الموضوع">{{  $contact->subject}}</textarea>
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    {{-- Message Input --}}
                    <div class="mb-3">
                        <label class="col-sm-5 col-form-label">الرسالة</label>
                        <textarea  class="form-control" name="message" maxlength="1500" rows="5" placeholder="أضف الرسالة">{{  $contact->message}}</textarea>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

               <div class="col-12">
                   <input class="btn btn-primary" type="submit" value="تعديل">
                   <a class="btn btn-primary" href="{{ route('dashboard.contact.index') }}">الرجوع الى صفحة معلومات الاتصال</a>
                </div>
           </form>

       </div>
   </div>
</div>
</div>
</div>


@endsection