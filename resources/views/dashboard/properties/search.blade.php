@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
بحث عن وحده
@endsection
@section('page-title-name')
بحث عن وحده
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



<div class="container-fluid my-3"> 

    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

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
    @if (count($property) > 0)
            @foreach ($property as $properties)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ Str::limit ($properties->title , 15) }}</td>
                <td>{{ Str::limit ($properties->address , 15) }}</td>
                <td>{{ $properties->price }}</td>
                <td>{{ $properties->space }}</td>
                <td>{{ $properties->hall }}</td>
                <td>{{ $properties->room }}</td>
                <td>{{ $properties->Baths }}</td>
                <td>{{ $properties->Kitchen }}</td>
                <td>{{ $properties->type }}</td>
                <td>{{ $properties->status }}</td>
                <td>{{ Str::limit ($properties->details , 15) }}</td>
                <td>{{ $properties->project->name }}</td>
                <td>{{ $properties->user->name }}</td>
                <td>
                    <a href="{{ route('dashboard.propertyAdmin.show', $properties->id) }}" class="btn btn-info waves-effect waves-light">عرض</a>
                </td>
                <td>
                    <a href="{{ route('dashboard.propertyAdmin.edit', $properties->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.propertyAdmin.destroy', $properties->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" value="حذف" type="submit">
                    </form>
                </td>  
            </tr>
            @endforeach
        @else
                <p>No results found.</p>
    @endif
        </tbody>
            <!-- end tbody -->
        </table><!-- end table -->
    </div>
</div>
{{ $property->links() }}

</div>
</div>  
@endsection