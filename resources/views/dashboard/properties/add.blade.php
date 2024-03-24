@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
إضافة وحده
@endsection

@section('page-title-name')
إضافة وحده
@endsection


<div class="container-fluid my-5">
<div class="row ">
     {{-- name	email	password	mobile	project_id	department_id --}}
    <div class="col-lg-12 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                </blockquote>
                <form action="{{ route('dashboard.property.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                         {{-- Title Input --}}
                    <div class="col-4">
                        <label for="example-text-input" class="col-sm-5 col-form-label">عنوان الوحده</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="title" placeholder="عنوان الوحده" {{ old('title') }} id="example-text-input">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                     {{-- Address Input --}}
                     <div class="col-8">
                        <label for="example-text-input" class="col-sm-5 col-form-label">العنوان</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="address" placeholder="العنوان" {{ old('address') }} id="example-text-input">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                         {{-- Price Input --}}
                    <div class="col-4">
                        <label for="example-text-input" class="col-sm-5 col-form-label">السعر</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="price" placeholder="السعر" {{ old('price') }} id="example-text-input">
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Floor Input --}}
                    <div class=" col-4">
                        <label for="example-text-input" class="col-sm-5 col-form-label">الطابق</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="number" name="floor" placeholder="الطابق" {{ old('floor') }} id="example-text-input">
                            @error('floor')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                   {{-- Space Input --}}
                    <div class=" col-4">
                        <label for="example-text-input" class="col-sm-5 col-form-label">المساحه</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="number" name="space" placeholder="المساحه" {{ old('space') }} id="example-text-input">
                            @error('space')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">

                    {{-- Hall Input --}}
                    <div class=" col-6">
                        <label for="example-text-input" class="col-sm-5 col-form-label">الريسيبشن</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="number" name="hall" placeholder="عدد الريسيبشن" {{ old('hall') }} id="example-text-input">
                            @error('hall')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Room Input --}}
                    <div class=" col-6">
                        <label for="example-text-input" class="col-sm-5 col-form-label">الغرف</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="number" name="room" placeholder="عدد الغرف" {{ old('space') }} id="example-text-input">
                            @error('room')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="row">

                    {{-- Baths Input --}}
                    <div class=" col-6">
                        <label for="example-text-input" class="col-sm-5 col-form-label">الحمام</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="number" name="Baths" placeholder="عدد الحمامات" {{ old('Baths') }} id="example-text-input">
                            @error('Baths')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Kitchen Input --}}
                    <div class=" col-6">
                    <label for="example-text-input" class="col-sm-5 col-form-label">المطبخ</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="number" name="Kitchen" placeholder="عدد المطبخ" {{ old('Kitchen') }} id="example-text-input">
                        @error('Kitchen')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>


                <div class="row">

                    {{-- Image 1  Input --}}
                    <div class=" col-4">
                        <label class="form-label" for="resume">صورة 1</label>
                    <input type="file" name="image_1" class="form-control" id="resume">
                @error('image_1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                    {{-- Image 2  Input --}}
                    <div class=" col-4">
                        <label class="form-label" for="resume">صورة 2</label>
                    <input type="file" name="image_2" class="form-control" id="resume">
                @error('image_2')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                    {{-- Image 3  Input --}}
                    <div class=" col-4">
                        <label class="form-label" for="resume">صورة 3</label>
                    <input type="file" name="image_3" class="form-control" id="resume">
                    @error('image_3')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                </div>

                {{-- Type Input --}}
                <div class="row mb-3">
                    <label class="col-sm-5 col-form-label">أختر نوع الوحده</label>
                    <div class="col-sm-12">
                        <select class="form-select" name="type" aria-label="Default select example">
                            <option selected="" disabled>أختر من القائمة</option>
                                <option value="villa">فيلا</option>
                                <option value="Apartment">شقه</option>
                        </select>
                    @error('type')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>


                {{-- status Input --}}
                <div class="row mb-3">
                    <label class="col-sm-5 col-form-label">أختر حالة الوحده</label>
                    <div class="col-sm-12">
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option selected="" disabled>أختر من القائمة</option>
                                <option value="sell">بيع</option>
                                <option value="rent">إيجار</option>
                        </select>
                    @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                {{-- Project Input --}}
                <div class="row mb-3">
                <label class="col-sm-5 col-form-label">مشروع</label>
                <div class="col-sm-12">
                    <select class="form-select" name="project_id" aria-label="Default select example">
                        <option selected="" disabled>أختر من القائمة</option>
                        @foreach ($project as $projects )
                            <option value="{{ $projects->id }}">{{ $projects->name }}</option>
                        @endforeach
                    </select>
                @error('project_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>

                      {{-- Project Input --}}
                      <div class="row mb-3">
                        <label class="col-sm-5 col-form-label">موظف المبيعات</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="user_id" aria-label="Default select example">
                                <option selected="" disabled>أختر من القائمة</option>
                                @foreach ($users as $user )
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


                {{-- Details Input --}}
                <div class="row mb-3">
                    <label class="col-sm-5 col-form-label">التفاصيل</label>
                    <textarea  class="form-control" name="details" maxlength="1500" rows="5" placeholder="أضف التفاصيل">{{ old('details') }}</textarea>
                @error('details')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>

                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="أضف">
                        <a class="btn btn-primary" href="{{ route('dashboard.property.index') }}">الرجوع الى صفحة الوحدات</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>


@endsection
