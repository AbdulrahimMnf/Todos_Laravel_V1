    <!-- Board Item 1-->
    <div class="col-md-6 col-lg-4 mb-5  text-center">
        <div class="Board-item mx-auto alert" style="background-color:{{ $board->color }}" data-bs-toggle="modal"
            data-bs-target="#BoardModal{{ $board->id }}">

            <div class="Board-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="Board-item-caption-content text-center text-white">{{ $board->name }}</div>
            </div>

        </div>
    </div>
    <!-- Board Modals-->
    <div class="Board-modal modal fade" id="BoardModal{{ $board->id }}" tabindex="-1"
        aria-labelledby="BoardModal{{ $board->id }}" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button class="mdi mdi-close-box btn text-danger " type="button" data-bs-dismiss="modal"  aria-label="Close">
                    </button></div>
                <div class="modal-body text-center pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <!-- Board Modal - Title-->
                                <h2 class="Board-modal-title text-dark text-uppercase mb-0">
                                    {{ $board->name }}
                                </h2>
                                <br>
                                <div class="w-100">
                                    <a href="{{ route('todos.create') }}" class="btn btn-outline-success w-100">Create
                                        New Task</a>
                                    <hr>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-dark ">

                                            <tr>
                                                <th>Title</th>
                                                <th class="text-danger">DeadLine</th>
                                                <th>Işlemler</th>
                                                <!-- <th>
                                                    <input class="w-100 form-control-sm text-center"
                                                        type="text" placeholder="Search ...">
                                                </th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($board->todos as $todo)

                                            <tr>
                                                    @if (($todo->deadline < date('Y-m-d') && $todo->state) || $todo->state)
                                                        <td class="text-success">{{ $todo->title }}</td>
                                                        @elseif ($todo->deadline < date('Y-m-d'))
                                                        <td class="text-danger">{{ $todo->title }}</td>
                                                       @else
                                                        <td class="text-dark">{{ $todo->title }}</td>
                                                    @endif

                                                    <td>{{ $todo->deadline }}
                                                    </td>
                                                    <td>
                                                        @if (!$todo->state)
                                                        <a href="{{route('todo.complated',[$todo->id])}}" class="btn btn-success">
                                                            <i class="mdi mdi-check"></i>
                                                        </a>
                                                        @endif
                                                        <a href="{{route('todos.show',[$todo])}}" class="btn btn-info text-white">
                                                            <i class="mdi mdi-information"></i>
                                                        </a>
                                                        <a href="{{route('todos.edit',[$todo])}}" class="btn btn-warning">
                                                            <i class="mdi mdi-table-edit"></i>
                                                        </a>
                                                        <form action="{{route('todos.destroy',[$todo])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="mdi mdi-delete-forever"></i>
                                                        </button>
                                                    </form>
                                                    </td>
                                                </tr>



                                            @empty
                                                <tr>
                                                    <td colspan="3" class="m-1">
                                                        <div class="alert alert-danger w-100">No Task ...</div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <form action="{{route('boards.destroy',[$board])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-xmark fa-fw"></i>
                            Delete {{$board->name}} Board
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
