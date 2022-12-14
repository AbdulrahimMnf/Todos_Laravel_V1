@extends('dashboard.layouts._')
@section('content')

<section class="page-section">
    <div class="container">
        <br>
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Update Board</p>
            </div>
            <div class="card-body">

                <form action="{{route('boards.update',[$board])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="color" class="h3 text-primary m-2">Name</label>
                                <input required class="form-control" type="text" name="name" placeholder="Name" value="{{$board->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="color" class="h3 text-primary m-2">Color</label>
                                <input required class="form-control" type="color" name="color" value="{{$board->color}}">
                            </div>
                        </div>
                        <br>
                    </div>
                    <button class="btn btn-primary" >
                        <i class="fa-solid fa-floppy-disk"></i>
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection
