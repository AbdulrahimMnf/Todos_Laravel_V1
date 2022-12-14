@extends('layouts.app')
@section('content')

<div class="container shadow">
    <div class="row text-center">
        <div class="col-12">
            <h1 class="text-dark"><b>Hello World</b></h1>
        </div>
        <div class="col-12">
            <h6 class="text-dark"><b>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat eligendi explicabo placeat, alias et ducimus distinctio. Asperiores dicta, dolor vero natus delectus quibusdam aliquam! Itaque nostrum magnam nihil quaerat deleniti.</b></h6>
        </div>
        <div class="col-12">
            <a href="{{route('login')}}" class="btn btn-outline-dark w-50 m-4">LOGIN</a>
        </div>
    </div>
</div>




@endsection
