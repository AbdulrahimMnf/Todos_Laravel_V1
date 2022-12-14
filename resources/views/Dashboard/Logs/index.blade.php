@extends('dashboard.layouts._')
@section('content')

<section class="page-section">
    <div class="container">
        <br>
        <div class="card shadow mb-3 w-100">
            <div class="card-header py-3">
                <p class="text-danger m-0 font-weight-bold">logs</p>
            </div>
            <div class="card-body">

                @forelse ($logs as $log)

                <div class="card text-center m-3">
                    <div class="card-header">
                        {{$log->user->name}}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$log->method}}</h5>
                        <p class="card-text">{{$log->url}}</p>
                        <hr/>
                    </div>
                    <div class="card-footer text-muted">
                        {{$log->created_at}}
                    </div>
                </div>
                @empty
                <div class="alert alert-danger w-100">No Logs ...</div>
                @endforelse
                {{$logs->links()}}
                </tbody>
                </table>
            </div>
            <a href="{{url('/dashboard')}}" class="btn btn-primary">Back To Home</a>
        </div>
    </div>
</section>


@endsection
