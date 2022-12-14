@extends('dashboard.layouts._')
@section('content')
<div class="content-wrapper pb-0">

    <div class="page-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('boards.index')}}">boards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create New boards </h4>
                    <form class="forms-sample" method="POST" action="{{ route('boards.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>board Name</label>
                                    <input type="text" name="name" class="form-control" required placeholder="Programming">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>board Color</label>
                                    <input type="color" name="color" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light" href="{{route('boards.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
