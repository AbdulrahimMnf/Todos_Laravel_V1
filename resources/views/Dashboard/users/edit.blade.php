@extends('dashboard.layouts._')
@section('content')
<div class="content-wrapper pb-0">


    <div class="page-header">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update</li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update User </h4>
                    <form class="forms-sample" method="POST" action="{{ route('users.update',[$user]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Isim</label>
                                    <input type="text" name="name" class="form-control" required placeholder="Abdulrahim" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="text-muted">(For delete all roles => Null)</label>
                                    <select class="form-control role w-100"  name="roles[]" multiple>
                                        @forelse ($roles as $item)
                                        <option value="{{$item->name}}">{{$item->name}}</option>

                                        @empty
                                        <option disabled selected value="0">No Roles</option>
                                        @endforelse
                                    </select>
                                </div>

                            </div>
                             <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                        </div>






                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>about</label>
                                    <textarea class="form-control" rows="5" name="about">{!!$user->about!!}</textarea>
                                </div>

                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a class="btn btn-light" href="{{route('users.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(".role").select2({
        tags: true,
        tokenSeparators: [',', ' '],
        placeholder: "Select a Role",
        allowClear: true
    })
</script>

@endsection
