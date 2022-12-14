@extends('dashboard.layouts._')
@section('content')
<div class="content-wrapper pb-0">



    <div class="card rounded w-100">
        <div class="card-body">
            <h4 class="card-title">Users Table</h4>
            <div class="row  ">
                <div class="col-md-2 mt-2">
                    <a class="card-description btn btn-success text-white w-100 " href="{{ route('users.create') }}">
                        Create User </a>
                </div>

                <div class="col-md-4">
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="Search (isim)">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mt-2 ">
                        <div class="dropdown show w-100">
                            <a class="btn btn-dark dropdown-toggle w-100 text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Role ...
                            </a>

                            <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
                                @forelse ($roles as $item)
                                <a class="dropdown-item" href="#">{{ $item->name }}</a>
                                @empty
                                <a class="dropdown-item text-muted">No Rols ... </a>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                @if (strpos(url()->current(), 'search') != false)
                <div class="col-md-2 mt-2">
                    <a class="card-description btn btn-warning text-white w-100 " href="{{ route('users.index') }}">clear filter</a>
                </div>
                @endif


            </div>
        </div>
        <table class="table table-hover  table-responsive ">
            <thead class="thead-dark">
                <tr>
                    <th>Işlemler</th>
                    <th>Isim</th>
                    <th>Yetkleri</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>
                        <a href="{{ route('users.show', [$user]) }}" class="text-info"><i class="mdi mdi-information-outline"></i></a>|
                        <a href="{{ route('users.edit', [$user]) }}" class="text-warning"><i class="mdi mdi-table-edit"></i></a>|
                        <form action="{{route('users.destroy',[$user])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger">
                                <i class="mdi mdi-delete-forever"></i>
                            </button>
                        </form>
                    </td>
                    <td class="text-info">{{ $user->name }}</td>
                    <td>
                        @forelse ($user->getRoleNames() as $role)
                        <span class="badge badge-dark">{{ $role }}</span>
                        @empty
                        <p class="badge badge-info">dont have any role</p>
                        @endforelse
                    </td>
                    <td>{{ $user->email }}</td>
                </tr>
                @empty
                <p class="alert alert-info m-4">No users found</p>
                @endforelse

            </tbody>
        </table>
        <div class="d-felx justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>




@endsection
