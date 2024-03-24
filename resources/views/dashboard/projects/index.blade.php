@extends('layouts.dashboard.app')
@section('dashboardcontent')

@section('title')
المشاريع
@endsection

@section('page-title-name')
المشروعات
@endsection

@section('buttonTitle')
<a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i> أضافة مشروع
</a>
@endsection



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
                        <th>أسم المشروع</th>
                        <th>عنوان الموقع</th>
                        <th>موظف المبيعات</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($projects as $project)
                        
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->location }}</td>
                        <td>{{ $project->user->name }}</td>
                        <td>
                            <a href="{{ route('dashboard.projects.edit', $project->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST">
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
        {{ $projects->links() }}
    </div>
</div>
        <!-- end col -->

    </div>
</div>


@endsection