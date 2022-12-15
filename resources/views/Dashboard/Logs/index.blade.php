@extends('dashboard.layouts._')
@section('content')

    <section class="page-section">
        <div class="container">
            <br>
            <div class="card shadow mb-3 w-100">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-danger m-0 font-weight-bold">logs</p>
                        </div>
                        @role('admin')
                            <div class="col-md-6 ">
                                <div class="input-group">
                                    <div class="dropdown show w-100">
                                        <a class="btn btn-dark dropdown-toggle w-100 text-white" href="#" user="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Select user ...
                                        </a>

                                        <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                                            @forelse ($users as $item)
                                                <a class="dropdown-item"
                                                    href="{{ route('log.search', [$item->id]) }}">{{ $item->name }}</a>
                                            @empty
                                                <a class="dropdown-item text-muted">{{ Auth::user()->name }} </a>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                                @if (strpos(url()->current(), 'search'))
                                    <a class="btn btn-warning text-white" href="{{ route('logs.show') }}">X</a>
                                @endif
                            </div>
                        @endrole
                    </div>
                </div>

                <div class="card-body">

                    @forelse ($logs as $log)
                        <div class="card text-center m-3">
                            <div class="card-header">
                                {{ $log->user->name }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $log->method }}</h5>
                                <p class="card-text">{{ $log->url }}</p>
                                <hr />
                            </div>
                            <div class="card-footer text-muted">
                                {{ $log->created_at }}
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger w-100">No Logs ...</div>
                    @endforelse
                    {{ $logs->links() }}
                    </tbody>
                    </table>
                </div>
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Back To Home</a>
            </div>
        </div>
    </section>


@endsection
