@extends('dashboard.layouts._')
@section('content')
<div class="content-wrapper pb-0">

    <section class="page-section Board" id="Board">
        <div class="container">
            <!-- Board Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Boards</h2>
<br>
            <!-- Board Grid Items-->
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 mb-5  text-center">
                    <a class="btn btn-outline-success w-100" href="{{route('boards.create')}}">
                        <i class="fa-solid fa-plus"></i>
                        Create Board
                    </a>
                    <hr>
                </div>
                @forelse ($boards as $board)
                @include('Dashboard.layouts.components.model', ['board' => $board])
                @empty
                <div class="alert alert-info w-100 text-center">No Boards</div>
                @endforelse

            </div>
            {{$boards->links()}}
        </div>
    </section>




</div>
@endsection
