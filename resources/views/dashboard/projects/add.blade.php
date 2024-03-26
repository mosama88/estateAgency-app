@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
إضافة مشروع
@endsection

@section('page-title-name')
أضافة مشروع
@endsection


<div class="container-fluid my-5">
<div class="row ">

    <div class="col-lg-8 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                <h3 class="text-center">أضافة مشروع</h3>
                </blockquote>
                <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    {{-- Name Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">أسم المشروع</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="name" placeholder="القسم" id="example-text-input">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    {{-- Title Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">العنوان الرئيسى للمشروع</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="title" placeholder="العنوان الرئيسى للمشروع" id="example-text-input">

                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                        {{-- Description Input --}}
                        <div class=" mb-3">
                            <label for="example-text-input" class="col-sm-5 col-form-label">التفاصيل</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="description" id="" name="description" placeholder="التفاصيل" cols="30" rows="5"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    

                    {{-- Location Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">عنوان الموقع</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="location" placeholder="عنوان الموقع" id="example-text-input">

                            @error('location')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                        {{-- User Input --}}
                            <div class="row mb-3">
                                <label class="col-sm-5 col-form-label">أختر موظف المبيعات</label>
                                <div class="col-sm-12">
                                    <select class="form-select" name="user_id" aria-label="Default select example">
                                        <option selected="" disabled>أختر من القائمة</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach    
                                    </select>
                                @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>


                             {{-- Image Input --}}
                             <div class="row mb-3">
                                <label class="col-sm-5 col-form-label">صورة</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" name="image" id="example-text-input">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>


                    <div class="col-12 my-4 ">
                        <input class="btn btn-primary" type="submit" value="أضف">
                        <a class="btn btn-primary" href="{{ route('dashboard.projects.index') }}">الرجوع الى صفحة المشروع</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection