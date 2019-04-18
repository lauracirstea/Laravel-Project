@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

@stop

@section('content')
    <div class="col-md-8 text-center">
        <div>
            <a href="#" class="btn btn-primary a-btn-slide-text update" data-id="{{$post->id}}">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <span>Edit</span>
            </a>

            <a href="#" class="btn btn-danger a-btn-slide-text delete" data-id="{{$post->id}}">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                <span>Delete</span>
            </a>
        </div>
        <h1>{{$post->title}}</h1>
        {{$post->body}}
        <hr>

        <div class="comment">
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">

                        <strong>
                            {{$comment->created_at->diffForHumans()}} by {{$post->user->name}} : &nbsp;
                        </strong>

                        {{$comment->body}}
                    </li>
                @endforeach
            </ul>
        </div>
        <hr>

        <div class="col-sm-4">
            <div class="card-block">
                <form method="POST" action="/posts/{{$post->id}}/comments">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea name="body" class="form-control" placeholder="Your comment here..."
                                  required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('modals.modal-post')

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            //EDIT
            $('.update').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: 'modal/'+$(this).attr('data-id'),
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (result) {
                        console.log(result);
                        $('#modal-post').replaceWith(result);
                        $('#modal-post').modal('show');
                    }
                });
            });

            $(document).on("click", ".save", function () {
                $.ajax({
                    url: "update/" + $(this).attr('data-id'),
                    method: "POST",
                    data: {
                        title: $('#recipient-title').val(),
                        body: $('#recipient-body').val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#modal-post').replaceWith(data);
                        $("#modal-post").modal('hide');
                        if (data.success == true) {
                            setTimeout(function () {
                                location.reload();
                            });
                        }
                    }
                });
            });

            //delete
            $('.delete').click(function (e) {
                e.preventDefault();
                console.log($(this).attr('data-id'));
                $.ajax({
                    url: '/posts/' + $(this).attr('data-id'),
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.success == true) {
                            window.location.href = "/";
                        }
                    }
                });
            });
        });
    </script>
@stop