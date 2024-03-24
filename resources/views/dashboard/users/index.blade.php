@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
الموظفين
@endsection


@section('page-title-name')
الموظفين
@endsection
@section('buttonTitle')
<a href="{{ route('dashboard.users.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i> أضافة موظف
</a>
@endsection

<div class="text-center coming-soon-search-form pt-2">
    <form action="{{ route('dashboard.search-user') }}" method="GET">
        <input type="text"  name="search" placeholder=" إبحث عن موظف أو القسم أو الصلاحيه....">
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
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <img src="{{ $user->image() }}" style="width: 100px; height:80px;" alt="">
                        </td>
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->department->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
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
        {{ $users->links() }}
    </div>
</div>
        <!-- end col -->

    </div>
</div>


@endsection