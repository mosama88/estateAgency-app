@extends('layouts.dashboard.app')
@section('dashboardcontent')
@section('title')
إضافة قسم
@endsection


@section('page-title-name')
أضافة قسم
@endsection


<div class="container-fluid my-5">
<div class="row ">

    <div class="col-lg-8 mx-auto my-5">
        <div class="card text-white bg-success">
            <div class="card-body">
                <blockquote class="card-blockquote mb-0">
                </blockquote>
                <form action="{{ route('dashboard.departments.store') }}" method="POST" id="send-data">
                    @csrf
                   
                    <div class=" mb-3">
                        <label for="example-text-input" class="col-sm-5 col-form-label">أسم القسم</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="name" placeholder="القسم" id="example-text-input">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                    <div class="col-12">
                        <input class="btn btn-primary" type="submit" value="أضف">
                        <a class="btn btn-primary" href="{{ route('dashboard.departments.index') }}">الرجوع الى صفحة الأقسام</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

@endsection


{{-- @section('script-send')

<script>
    let formElment = document.getElementById('send-data');
    formElment.addEventlistener("submit", function(e)){
        e.preventDefault();
        let inputNmae = formElement.querySelector("#name");
        let token = formElement.querySelector("input=[name='_token']");
        console.log(name.value);
        console.log(token.value);
        return false;
        fetch(formElment.action,{
            method:"POST",
            headers:{
                "Accept":"application/json",
                "Content-Type":"application/json",
                "X-CSRF-TOKEN":
            }
            body:JSON.stringfy({name:inputName.value})
        }).then(res=>){
            return res.json();
        }

    }

</script>

@endsection --}}