@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
الأقسام
@endsection
@section('page-title-name')
الأقسام
@endsection

@section('buttonTitle')
<a href="{{ route('dashboard.departments.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i> أضافة قسم
</a>
@endsection




<div class="text-center coming-soon-search-form pt-2">
    <form action="{{ route('dashboard.search-department') }}" method="GET">
        <input type="text"  name="search" placeholder="إبحث عن القسم....">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <!-- end form -->
</div>

{{-- @if (count($results) > 0)
    <ul>
        @foreach ($results as $result)
            <li>{{ $result->name }}</li>
        @endforeach
    </ul>
@else
    <p>No results found.</p>
@endif --}}

<div class="container-fluid my-3"> 

    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    @if(session('success')!=null)
                    <h3 class="alert alert-success text-center my-3">
                        {{session('success')}}
                    </h3>
                    @endif
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
                @foreach ($departments as $deparment)
                        
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $deparment->name }}</td>
                        
                        <td>
                            <a href="{{ route('dashboard.departments.edit', $deparment->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.departments.destroy', $deparment->id) }}" method="POST">
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
        {{ $departments->links() }}
    </div>
</div>
        <!-- end col -->

    </div>
</div>


@endsection