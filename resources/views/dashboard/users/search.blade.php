@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
بحث عن موظف
@endsection
@section('page-title-name')
بحث عن موظف
@endsection

@section('buttonTitle')
<a href="{{ route('dashboard.users.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i> أضافة موظف
</a>
@endsection


{{-- <form action="{{ route('dashboard.departments.index') }}" method="GET"> --}}


<div class="text-center coming-soon-search-form pt-2">
    <form action="{{ route('dashboard.search-department') }}" method="GET">
        <input type="text" name="search" placeholder="إبحث عن موظف....">
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
                <th>الأسم</th>
                <th>البريد الالكترونى</th>
                <th>الموبايل</th>
                <th>صورة</th>
                <th>الصلاحيه</th>
                <th>القسم</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
    @if (count($user) > 0)
            @foreach ($user as $users)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->phone }}</td>
                <td>
                    <img src="{{ $users->image() }}" style="width: 100px; height:80px;" alt="">
                </td>
                <td>{{ $users->type }}</td>
                <td>{{ $users->department->name }}</td>
                <td>
                    <a href="{{ route('dashboard.users.edit', $users->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                </td>
                <td>
                    <form action="{{ route('dashboard.users.destroy', $users->id) }}" method="POST">
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
</div>
</div>  
@endsection