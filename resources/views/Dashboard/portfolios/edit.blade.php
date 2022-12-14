@extends('dashboard.layouts._')
@section('content')
<div class="content-wrapper pb-0">


    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Update portfolio </li>
            </ol>
        </nav>
    </div>
    <div class="row">

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <img class="card-img rounded p-5" src="https://picsum.photos/200/300" style="height: 75vh;" alt="Card image cap">

                <div class="card-body">
                    <h4 class="card-title">Update portfolio </h4>
                    <form class="forms-sample" method="POST" action="{{ route('portfolio.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Isim</label>
                                    <input type="text" name="name" class="form-control" required placeholder="Abdulrahim" value="{{$portfolio->name}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" value="{{$portfolio->email}}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="text-muted">Roles</label><br>
                                    @forelse ($portfolio->getRoleNames() as $item)
                                    <div class="badge badge-primary">{{$item->name}}</div>
                                    @empty
                                    <div class="badge badge-primary">No Roles</div>
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
                            <div class="input-group col-md-12">
                                <input type="file" class="form-control file-upload-info" name="image">
                                <br>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label>about</label>
                                    <textarea class="form-control" rows="5" name="about">{!!$portfolio->about!!}</textarea>
                                </div>

                            </div>

                        </div>

                        <button type="submit" class="btn btn-warning mr-2">Update</button>
                        <a class="btn btn-light" href="{{url('dashboard')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
