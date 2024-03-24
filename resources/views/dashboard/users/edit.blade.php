href="{{ route('dashboard.users.index') }}"@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
تعديل بيانات الموظف
@endsection

@section('page-title-name')
تعديل بيانات الموظف
@endsection


<div class="container-fluid my-5">
<div class="row ">

    <div class="col-lg-8 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                </blockquote>
                <form action="{{route('dashboard.users.update' , $users->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                    {{-- Name Input --}}
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">أسم الموظف</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="name" value="{{ $users->name }}" placeholder="الموظف" {{ old('name') }} id="example-text-input">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Email Input --}}
                    <div class=" mb-3">
                    <label for="example-text-input" class="col-sm-5 col-form-label">البريد الالكترونى</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="email" name="email" value="{{ $users->email }}" placeholder="البريد الالكترونى" {{ old('email') }} id="example-text-input">

                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Password Input --}}
                <div class=" mb-3">
                    <label for="example-text-input" class="col-sm-5 col-form-label">كلمة المرور</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="password" name="password" value="{{ $users->password }}" placeholder="كلمة المرور" {{ old('password') }} id="example-text-input">

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Phone Input --}}
                <div class=" mb-3">
                    <label for="example-text-input" class="col-sm-5 col-form-label">الموبايل</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="text" name="phone" value="{{ $users->phone }}"  placeholder="الموبايل" {{ old('phone') }} id="example-text-input">

                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Department Input --}}
                <div class="row mb-3">
                    <label class="col-sm-5 col-form-label">أختر القسم</label>
                    <div class="col-sm-12">
                        <select class="form-select" name="department_id" aria-label="Default select example">
                            <option selected="" disabled>أختر من القائمة</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"@selected($users->department_id == $department->id)>{{ $department->name }}</option>

                            @endforeach
                        </select>
                        @error('department_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- Type Input --}}
                <div class="row mb-3">
                    <label class="col-sm-5 col-form-label">أختر الصلاحيه</label>
                    <div class="col-sm-12">
                        <select class="form-select" name="type" aria-label="Default select example">
                            <option selected="" disabled>أختر من القائمة</option>
                                <option value="admin"{{ $users->type === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user"{{ $users->type === 'user' ? 'selected' : '' }}>User</option>
                        </select>

                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                {{-- Image Input --}}
                <div class="row mb-3">
                    <label class="col-sm-5 col-form-label" for="resume">صورة</label>
                    <input type="file" name="image" class="form-control" id="resume">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img class="my-2" src="{{ $users->image()}}" style="width: 100px; height:80px;" alt="">
                    </div> 
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="تعديل">
                        <a class="btn btn-primary" href="{{ route('dashboard.users.index') }}">الرجوع الى صفحة الأقسام</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection