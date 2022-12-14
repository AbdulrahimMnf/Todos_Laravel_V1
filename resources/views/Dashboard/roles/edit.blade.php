@extends('dashboard.layouts._')
@section('content')
<div class="content-wrapper pb-0">

    <div class="page-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New roles </h4>
                    <form class="forms-sample" method="POST" action="{{ route('roles.update',[$role->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input type="text" name="name" class="form-control" required value="{{$role->name}}">
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light" href="{{route('roles.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
