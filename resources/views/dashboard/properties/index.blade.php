@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
الوحدات
@endsection

@section('page-title-name')
الوحدات المتاحه
@endsection
@section('buttonTitle')
<a href="{{ route('dashboard.propertyAdmin.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i> أضافة وحده
</a>
@endsection
<div class="text-center coming-soon-search-form pt-2">
    <form action="{{ route('dashboard.search-property') }}" method="GET">
        <input type="text" name="search" placeholder="إبحث عن وحده أو الحاله أو النوع  أو الموظف أو المشروع....">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <!-- end form -->
</div>
<div class="container-fluid my-5"> 
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    @if(session('success')!=null)
                    <h3 class="alert alert-success text-center">
                        {{session('success')}}
                    </h3>
                    @endif
        <div class="table-responsive">
            <table class="table mb-0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان الوحده</th>
                        <th>العنوان</th>
                        <th>السعر</th>
                        <th>المساحه</th>
                        <th>الريسيبشن</th>
                        <th> الغرف</th>
                        <th> الحمام</th>
                        <th>المطبخ</th>
                        <th>نوع </th>
                        <th>حالة</th>
                        <th>التفاصيل</th>
                        <th>مشروع</th>
                        <th>الموظف</th>
                        <th>عرض</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ Str::limit ($property->title , 15) }}</td>
                        <td>{{ Str::limit ($property->address , 15) }}</td>
                        <td>{{ $property->price }}</td>
                        <td>{{ $property->space }}</td>
                        <td>{{ $property->hall }}</td>
                        <td>{{ $property->room }}</td>
                        <td>{{ $property->Baths }}</td>
                        <td>{{ $property->Kitchen }}</td>
                        <td>{{ $property->type }}</td>
                        <td>{{ $property->status }}</td>
                        <td>{{ Str::limit ($property->details , 15) }}</td>
                        <td>{{ $property->project->name }}</td>
                        <td>{{ $property->user->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.propertyAdmin.show', $property->id) }}" class="btn btn-info waves-effect waves-light">عرض</a>
                        </td>
                        <td>
                            <a href="{{ route('dashboard.propertyAdmin.edit', $property->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.propertyAdmin.destroy', $property->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" value="حذف" type="submit">
                            </form>
                        </td>  
                    </tr>
                @endforeach
                    </tbody>
                    <!-- end tbody -->
                </table><!-- end table -->
            </div>
        </div>
        {{ $properties->links() }}
    </div>
</div>
        <!-- end col -->

    </div>
</div>


@endsection