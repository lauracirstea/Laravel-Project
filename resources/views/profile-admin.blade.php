@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1 class="text-center">Profile Page</h1>
    <hr>
@stop

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Admin name</th>
            <th>Email address</th>
            <th>Password</th>
        </tr>

        @foreach($admins as $admin)
            @if($admin->status == 'Admin' )
                <tr>
                    <td> {{$admin->name}}</td>
                    <td>   {{$admin->email}}</td>
                    <td>  {{$admin->password}}</td>
                    <td>
                        <a href="#" class="btn btn-primary a-btn-slide-text update" data-id="{{$admin->id}}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span>Edit</span>
                        </a>

                        <a href="#" class="btn btn-danger a-btn-slide-text delete" data-id="{{$admin->id}}">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            <span>Delete</span>
                        </a>

                    </td>
                </tr>
            @endif
        @endforeach

        @include('modals.modal-admin')


    </table>

@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

