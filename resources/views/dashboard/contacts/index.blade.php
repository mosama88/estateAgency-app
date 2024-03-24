@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
أعدادات الموقع
@endsection


@section('page-title-name')
أضافة بيانات الاتصال
@endsection

@section('buttonTitle')
<a href="{{ route('dashboard.contact.create') }}" class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
    <i class="fas fa-plus me-2"></i>  أضافة بيانات الاتصال
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
                        <th>الأسم</th>
                        <th>البريد الالكترونى</th>
                        <th>الموضوع</th>
                        <th> الرسالة</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit ($contact->subject , 15) }}</td>
                        <td>{{ Str::limit ($contact->message , 15) }}</td>
                        <td>
                            <a href="{{ route('dashboard.contact.edit', $contact->id) }}" class="btn btn-success waves-effect waves-light">تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.contact.destroy', $contact->id) }}" method="POST">
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
        {{ $contacts->links() }}
    </div>
</div>
        <!-- end col -->

    </div>
</div>

@endsection