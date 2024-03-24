@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
تعديل بيانات المشروع
@endsection

@section('page-title-name')
تعديل المشروع
@endsection


<div class="container-fluid my-5">
<div class="row ">

    <div class="col-lg-8 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                <h3 class="text-center">تعديل المشروع</h3>
                </blockquote>
                <form action="{{route('dashboard.projects.update' , $projects->id)}}" method="POST">
                   @csrf
                   @method('PUT')
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">أسم القسم</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="name" value="{{ $projects->name }}" placeholder="القسم" id="example-text-input">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">عنوان الموقع</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="location" value="{{ $projects->location }}"  placeholder="عنوان الموقع" id="example-text-input">

                            @error('location')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- status Input --}}
                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">أختر موظف المبيعات</label>
                            <div class="col-sm-12">
                                <select class="form-select" name="user_id" aria-label="Default select example">
                                    <option selected="" disabled>أختر من القائمة</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"@selected($projects->user_id == $user->id)>{{ $user->name }}</option>
                                    @endforeach    
                                </select>
                            @error('user_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        
                    <div class="col-12 my-4">
                        <input class="btn btn-primary" type="submit" value="تعديل">
                        <a class="btn btn-primary" href="{{ route('dashboard.projects.index') }}">الرجوع الى صفحة المشروع</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection