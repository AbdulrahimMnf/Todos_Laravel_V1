@extends('dashboard.layouts._')
@section('content')

    <section class="page-section">
        <div class="container">
            <br>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-danger m-0 font-weight-bold">Delete Item</p>
                </div>
                <div class="card-body">
                    {{$board->title}}
                <hr>

                <div class="w-100">
                    <a href="{{url('/dashboard')}}" class="btn btn-primary">Back To List</a> |
                    <a href="{{ route('boards.destroy',[$board]) }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            </div>
        </div>

    </section>


@endsection
