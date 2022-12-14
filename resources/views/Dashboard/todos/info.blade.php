@extends('dashboard.layouts._')
@section('content')

    <section class="page-section">
        <div class="container">
            <br>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">{{$todo->title}}</p>
                </div>
                <div class="card-body">
                {!!$todo->topic!!}
                <hr>
                <h5>DeadLine : <span class="text-danger">{{$todo->deadline}}</span></h5>
                <hr>
                @if ($todo->state)
                <h5>DeadLine : <span class="text-success">Complated</span></h5>
                @else
                <h5>State : <span class="text-warning">Not Complated</span></h5>
                @endif
                <div class="w-100">
                    <a href="{{url('/dashboard')}}" class="btn btn-primary">Back To List</a> |
                    <a href="{{ route('todos.edit',[$todo]) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
            </div>
        </div>

    </section>


@endsection
