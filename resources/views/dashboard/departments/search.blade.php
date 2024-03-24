@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
بحث عن القسم
@endsection
@section('page-title-name')
بحث عن القسم
@endsection

@section('buttonTitle')
<a href="{{ route('dashboard.departments.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i> أضافة قسم
</a>
@endsection


{{-- <form action="{{ route('dashboard.departments.index') }}" method="GET"> --}}


<div class="text-center coming-soon-search-form pt-2">
    <form action="{{ route('dashboard.search-department') }}" method="GET">
        <input type="text" name="search" placeholder="إبحث عن القسم....">
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
                <th>أسم القسم</th>
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tbody>
            @if (count($results) > 0)
                @foreach ($results as $result)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $result->name }}</td>
                    <td>
                        <a href="{{ route('dashboard.departments.edit', $result->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                    </td>
                    <td>
                        <form action="{{ route('dashboard.departments.destroy', $result->id) }}" method="POST">
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