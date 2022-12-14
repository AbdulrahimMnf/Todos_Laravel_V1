@extends('dashboard.layouts._')
@section('content')

<section class="page-section">
    <div class="container">
        <br>
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-danger m-0 font-weight-bold">Reviews</p>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>

                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>subject</th>
                                <th>message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $review)

                            <tr>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->email }}</td>
                                <td>{{ $review->subject }}</td>
                                <td>{{ $review->message }}</td>
                                <td>
                                    <form action="{{route('reviews.destroy',[$review])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="4" class="m-1">
                                    <div class="alert alert-danger w-100">No Revies ...</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{url('/dashboard')}}" class="btn btn-primary">Back To Home</a>
            </div>
        </div>
    </div>
    </div>

</section>


@endsection
