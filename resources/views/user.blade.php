@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>User Page</h1>

@stop

@section('content')
<table class="table table-bordered">
    <tr>
        <th>User Name</th>
        <th>Email address</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)
        <tr>
            <td> {{$user->name}}</td>
            <td>   {{$user->email}}</td>
            <td>  {{$user->password}}</td>
            <td> <a href="#" class="btn btn-primary a-btn-slide-text">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    <span><strong>Edit</strong></span>
                </a>
            </td>
            <td><a href="#" class="btn btn-danger a-btn-slide-text">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    <span><strong>Delete</strong></span>
                </a>
            </td>
        </tr>
    @endforeach


</table>

@stop

@section('css')

    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')

    <script> console.log('Hi!'); </script>

@stop