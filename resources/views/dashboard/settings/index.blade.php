@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
أعدادات الموقع
@endsection

@section('page-title-name')
أعدادات الموقع
@endsection

@section('buttonTitle')
<a href="{{ route('dashboard.settings.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i> أضافة إعدادات
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
                        <th>البريد الألكترونى</th>
                        <th>الموبايل</th>
                        <th>العنوان</th>
                        <th> الوصف</th>
                        <th>facebook</th>
                        <th>instgram</th>
                        <th>linkedin </th>
                        <th>twitter</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($settings as $setting)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $setting->email }}</td>
                        <td>{{ $setting->phone }}</td>
                        <td>{{ Str::limit ($setting->address , 15) }}</td>
                        <td>{{ Str::limit ($setting->description , 15) }}</td>
                        <td>{{ Str::limit ($setting->facebook , 15) }}</td>
                        <td>{{ Str::limit ($setting->instgram , 15) }}</td>
                        <td>{{ Str::limit ($setting->linkedin , 15) }}</td>
                        <td>{{ Str::limit ($setting->twitter , 15) }}</td>
                        <td>
                            <a href="{{ route('dashboard.settings.edit', $setting->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.settings.destroy', $setting->id) }}" method="POST">
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
        {{ $settings->links() }}
    </div>
</div>
        <!-- end col -->

    </div>
</div>

@endsection