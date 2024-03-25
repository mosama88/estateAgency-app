@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
الوحدات
@endsection
@section('page-title-name')
شقه للبيع
@endsection
<div class="container-fluid">



<div class="col-lg-6">
    <div class="card">
        <div class="card-body">

            <p class="card-title-desc">أسم المشروع</p>

            <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item">
                        <img src="{{ $property->image_1() }}" style="width:2000px; height:500px;"  alt="..." class="d-block img-fluid">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>فرص بلا حدود</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $property->image_2() }}" style="width: 2000px; height: 500px;" alt="..." class="d-block img-fluid">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>راحتك معانا</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <img src="{{ $property->image_3() }}" style="width:2000px; height:500px;" alt="..." class="d-block img-fluid">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>كل المميزات هتلاقيها هنا</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="table-responsive">
    <table class="table table-striped mb-0">
        <thead>
        <tr>
            <th style="width: 50%;">السعر</th>
            <th>{{ $property->price }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>المساحه</td>
            <td>
                <a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click">{{ $property->space }}</a>
            </td>
        </tr>
        <tr>
            <td>الطابق</td>
            <td>
                <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">{{ $property->floor }}</a>
            </td>
        </tr>
        <tr>
            <td>الريسيبشن</td>
            <td>
                <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">{{ $property->hall }}</a>
            </td>
        </tr>
        <tr>
            <td>الغرف</td>
            <td>
                <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">{{ $property->room }}</a>
            </td>
        </tr>
        <tr>
            <td>الحمامات</td>
            <td>
                <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">{{ $property->Baths }}</a>
            </td>
        </tr>
        <tr>
            <td>المطبخ</td>
            <td>
                <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">{{ $property->Kitchen }}</a>
            </td>
        </tr>
        <tr>
            <td>حالة العقار</td>
            <td>
                <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty">{{ $property->status }}</a>
            </td>
        </tr>
        <tr>
            <td>نوع العقار</td>
            <td>
                <a href="#" id="inline-sex" data-type="select" data-pk="1" data-value="" data-title="Select sex" class="editable editable-click" style="color: rgb(152, 166, 173);">{{ $property->type }}</a>
            </td>
        </tr>
        <tr>
            <td>مشروع</td>
            <td>
                <a href="#" id="inline-dob" data-type="combodate" data-value="2015-09-24" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth" class="editable editable-click"> {{ $property->project->name }} </a>
            </td> 
        </tr>
        <tr>
            <td>التفاصيل</td>
            <td>
                <a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments" class="editable editable-pre-wrapped editable-click">{{ $property->details }}</a>
            </td>
        </tr>

        </tbody>
    </table>
</div>
</div>















{{-- details






image_1
image_2
image_3
type

project_id --}}







@endsection
