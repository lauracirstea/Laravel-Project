@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1 class="text-center">Admin Page</h1>
    <hr>
@stop

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>User name</th>
            <th>Email address</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach($admins as $admin)
            <tr>
                <td> {{$admin->name}}</td>
                <td>   {{$admin->email}}</td>
                <td>  {{$admin->role}}</td>
                <td>  {{$admin->status}}</td>
                <td>
                    <a href="#" class="btn btn-primary a-btn-slide-text update" data-id="{{$admin->id}}">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span>Edit</span>
                    </a>

                    <a href="#" class="btn btn-danger a-btn-slide-text delete" data-id="{{$admin->id}}">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <span>Delete</span>
                    </a>

                    <a href="#" class="btn btn-primary a-btn-slide-text status" id="status-btn" data-id="{{$admin->id}}"  data-value="@if($admin->status) 0 @else 1 @endif">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        @if($admin->status)
                            <span class="checked">Accepted</span>
                            @else
                            <span class="checked">Status</span>
                        @endif
                    </a>
                </td>
            </tr>
        @endforeach

@include('modals.modal-admin')


    </table>

    {{$admins->render()}}

@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

    <script>
        $(document).ready(function(){
            $('.update').click(function(e){
                e.preventDefault();
                $.ajax({
                    url: "admin/" + $(this).attr('data-id'),
                    method: 'GET',
                    success: function(result){
                        $('#modal').replaceWith(result);
                        $('#modal').modal('show');
                    }
                });
            });

            //edit
            $(document).on("click",".save",function() {
                $.ajax({
                    url: "admin/update/" + $(this).attr('data-id'),
                    method: "POST",
                    data: {
                        name: $('#recipient-name').val(),
                        email: $('#recipient-email').val(),
                        role: $('#recipient-role').val(),
                    },
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#modal').replaceWith(data);
                        $("#modal").modal('hide');
                        if(data.success == true){
                            setTimeout(function(){
                                location.reload();
                            });
                        }
                    }
                });
            });

            //delete
            $('.delete').click(function(e){
                e.preventDefault();
                $.ajax({
                    url: "admin/" + $(this).attr('data-id'),
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        if(data.success == true){
                            setTimeout(function(){
                                location.reload();
                            });
                        }
                    }
                });
            });

            //status
            $(document).on("click",".status",function() {
                var _this = $(this);
                $.ajax({
                    url: "admin/status/" + $(this).attr('data-id'),
                    method: "POST",
                    data: {
                        status: _this.attr('data-value'),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (status) {
                        _this.find('.checked').text("Accepted");
                        if(status.success == true){
                            setTimeout(function(){
                                location.reload();
                            });
                        }
                    }
                });
            });

            //pagination
        });
    </script>
@stop