@extends('dashboard.layouts._')
@section('content')
    <script src="https://cdn.tiny.cloud/1/bxaqhqwnedqtcgozbcr4s57mc3gc1uht45h9kzm1uhspx86p/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <section class="page-section">
        <div class="container">
            <br>
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Update Task</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('todos.update', [$todo]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row m-1">
                            <div class="col">
                                <div class="form-group"><label for="title"><strong>Title</strong></label><input required
                                        class="form-control" type="text" name="title" value="{{ $todo->title }}">
                                </div>
                            </div>

                        </div>

                        <div class="form-row m-1">
                            <div class="col">
                                <div class="form-group"><label for="DeadLine"><strong>DeadLine</strong></label><input
                                        required class="form-control" type="date" name="deadline"
                                        min="{{ date('Y-m-d') }}" value="{{ $todo->deadline }}"></div>
                            </div>
                        </div>


                        <div class="form-group m-1">
                            <label class="control-label">Board</label>
                            <select class="form-select" aria-label="Default select example" name="board_id">
                                <option selected disabled>Select Board...</option>
                                @foreach ($boards as $board)
                                    <option value="{{ $board->id }}">{{ $board->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-row m-1">
                            <div class="col">
                                <div class="form-group"><label for="topic"
                                        class="m-1"><strong>Topic</strong><br></label>
                                    <textarea class="form-control" rows="4" name="topic" style="height: 209px;">
                                    {!! $todo->topic !!}
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-1">
                            <button class="btn btn-success btn-sm" type="submit">Update</button>|
                            <a href="{{ url('/dashboard') }}" class="p-1">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
@endsection
