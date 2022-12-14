@extends('dashboard.layouts._')
@section('content')
    <div class="content-wrapper pb-0">

        <div class="card rounded w-100">
            <div class="card-body">
                <h4 class="card-title">Roles Table</h4>
                <div class="row  ">
                    <div class="col-md-2 mt-2">
                        <a class="card-description btn btn-success text-white w-100 " href="{{ route('roles.create') }}">
                            Create Role </a>
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

                    @if (strpos(url()->current(), 'search') != false)
                        <div class="col-md-2 mt-2">
                            <a class="card-description btn btn-warning text-white w-100 "
                                href="{{ route('roles.index') }}">clear filter</a>
                        </div>
                    @endif


                </div>
                <table class="table table-hover w-100  table-responsive ">
                    <thead class="thead-dark">
                        <tr>
                            <th>Işlemler</th>
                            <th>Isim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>

                                    <a href="{{ route('roles.edit', [$role->id]) }}" class=" btn text-warning"><i
                                            class="mdi mdi-table-edit"></i></a>
                                    <form action="{{ route('roles.destroy', [$role->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-danger btn"><i class="mdi mdi-delete-forever"></i></button>
                                    </form>
                                </td>
                                <td class="text-info">{{ $role->name }}</td>
                            </tr>
                        @empty
                            <p class="alert alert-info m-4">No roles found</p>
                        @endforelse

                    </tbody>
                </table>



            <div class="d-felx justify-content-center">
                {{ $roles->links() }}
            </div>
        </div>
    </div>




    </div>
@endsection
