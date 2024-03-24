@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
تعديل بيانات الوحده
@endsection

@section('page-title-name')
تعديل بيانات الوحده
@endsection


<div class="container-fluid my-5">
    <div class="row mb-3">

    <div class="col-lg-12 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                </blockquote>
                <form action="{{route('dashboard.property.update' , $property->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')

                   <div class="row mb-3">
                    {{-- Title Input --}}
                    <div class="col-4">
                        <label for="example-text-input" class="col-sm-5 col-form-label">عنوان الوحده</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="title" value="{{ $property->title }}" placeholder="عنوان الوحده" {{ old('title') }} id="example-text-input">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                     {{-- Address Input --}}
                     <div class="col-8">
                        <label for="example-text-input" class="col-sm-5 col-form-label">العنوان</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="address" value="{{ $property->address }}" placeholder="العنوان" {{ old('address') }} id="example-text-input">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Price Input --}}
               <div class="col-4">
                   <label for="example-text-input" class="col-sm-5 col-form-label">السعر</label>
                   <div class="col-sm-12">
                       <input class="form-control" type="text" name="price" value="{{ $property->price }}" placeholder="السعر" {{ old('price') }} id="example-text-input">
                       @error('price')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
               </div>

               {{-- Floor Input --}}
               <div class=" col-4">
                   <label for="example-text-input" class="col-sm-5 col-form-label">الطابق</label>
                   <div class="col-sm-12">
                       <input class="form-control" type="number" name="floor" value="{{ $property->floor }}" placeholder="الطابق" {{ old('floor') }} id="example-text-input">
                       @error('floor')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
               </div>

              {{-- Space Input --}}
               <div class=" col-4">
                   <label for="example-text-input" class="col-sm-5 col-form-label">المساحه</label>
                   <div class="col-sm-12">
                       <input class="form-control" type="number" name="space" value="{{ $property->space }}" placeholder="المساحه" {{ old('space') }} id="example-text-input">
                       @error('space')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
               </div>
           </div>
              

           <div class="row mb-3">
           
               {{-- Hall Input --}}
               <div class=" col-6">
                   <label for="example-text-input" class="col-sm-5 col-form-label">الريسيبشن</label>
                   <div class="col-sm-12">
                       <input class="form-control" type="number" name="hall" value="{{ $property->hall }}" placeholder="عدد الريسيبشن" {{ old('hall') }} id="example-text-input">
                       @error('hall')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
               </div>
               {{-- Room Input --}}
               <div class=" col-6">
                   <label for="example-text-input" class="col-sm-5 col-form-label">الغرف</label>
                   <div class="col-sm-12">
                       <input class="form-control" type="number" name="room" value="{{ $property->room }}" placeholder="عدد الغرف" {{ old('space') }} id="example-text-input">
                       @error('room')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
               </div>
           
           </div>
              

           <div class="row mb-3">

               {{-- Baths Input --}}
               <div class=" col-6">
                   <label for="example-text-input" class="col-sm-5 col-form-label">الحمام</label>
                   <div class="col-sm-12">
                       <input class="form-control" type="number" name="Baths" value="{{ $property->Baths }}" placeholder="عدد الحمامات" {{ old('Baths') }} id="example-text-input">
                       @error('Baths')
                           <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </div>
               </div>
               {{-- Kitchen Input --}}
               <div class=" col-6">
               <label for="example-text-input" class="col-sm-5 col-form-label">المطبخ</label>
               <div class="col-sm-12">
                   <input class="form-control" type="number" name="Kitchen" value="{{ $property->Kitchen }}" placeholder="عدد المطبخ" {{ old('Kitchen') }} id="example-text-input">
                   @error('Kitchen')
                       <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>
               </div>
           </div>


           <div class="row mb-3">
                
               {{-- Image 1  Input --}}
               <div class=" col-4">
                   <label class="form-label" for="resume">صورة 1</label>
               <input type="file" name="image_1" value="{{ $property->image_1 }}" class="form-control" id="resume">
               <img class="my-2" src="{{asset( 'public/' . $property->image_1 )}}" style="width: 100px; height:80px;" alt="">

           @error('image_1')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
           </div>                
               {{-- Image 2  Input --}}
               <div class=" col-4">
                   <label class="form-label" for="resume">صورة 2</label>
               <input type="file" name="image_2" value="{{ $property->image_2 }}" class="form-control" id="resume">
               <img class="my-2" src="{{asset( 'public/' . $property->image_2 )}}" style="width: 100px; height:80px;" alt="">

           @error('image_2')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
                </div>
               {{-- Image 3  Input --}}
               <div class=" col-4">
                   <label class="form-label" for="resume">صورة 3</label>
               <input type="file" name="image_3" value="{{ $property->image_3 }}"  class="form-control" id="resume">
               <img class="my-2" src="{{asset( 'public/' . $property->image_3 )}}" style="width: 100px; height:80px;" alt="">
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
                           <option value="villa"{{ $property->type === 'villa' ? 'selected' : '' }}>فيلا</option>
                           <option value="Apartment"{{ $property->type === 'Apartment' ? 'selected' : '' }}>شقه</option>
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
                           <option value="sell"{{ $property->status === 'sell' ? 'selected' : '' }}>بيع</option>
                           <option value="rent"{{ $property->status === 'rent' ? 'selected' : '' }}>إيجار</option>
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
                       <option value="{{ $projects->id }}"@selected($property->project_id == $projects->id)>{{ $projects->name }}</option>
                   @endforeach
               </select>                               
           @error('project_id')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
           </div>
       </div>


       {{-- User Input --}}
                      <div class="row mb-3">
                        <label class="col-sm-5 col-form-label">موظف المبيعات</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="user_id" aria-label="Default select example">
                                <option selected="" disabled>أختر من القائمة</option>
                                @foreach ($users as $user )
                                    <option value="{{ $user->id }}"@selected($property->user_id == $user->id)>{{ $user->name }}</option>
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
               <textarea  class="form-control" name="details" maxlength="1500" rows="5" placeholder="أضف التفاصيل">{{ $property->details }}</textarea>
           @error('details')
               <div class="alert alert-danger">{{ $message }}</div>
           @enderror
           </div>

               <div class="col-12">
                   <input class="btn btn-primary" type="submit" value="تعديل">
                   <a class="btn btn-primary" href="{{ route('dashboard.property.index') }}">الرجوع الى صفحة الوحدات</a>
               </div>
           </form>

       </div>
   </div>
</div>
</div>
</div>


@endsection