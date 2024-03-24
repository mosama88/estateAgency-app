@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
تعديل بيانات القسم
@endsection

@section('page-title-name')
تعديل بيانات القسم
@endsection
<div class="container-fluid my-5">
<div class="row ">

    <div class="col-lg-8 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                </blockquote>
                <form action="{{route('dashboard.departments.update' , $departments->id)}}" method="POST">
                   @csrf
                   @method('PUT')
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">أسم القسم</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="name" value="{{ $departments->name }}" placeholder="القسم" id="example-text-input">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="تعديل">
                        <a class="btn btn-primary" href="{{ route('dashboard.departments.index') }}">الرجوع الى صفحة الأقسام</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection