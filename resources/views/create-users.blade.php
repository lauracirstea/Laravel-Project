@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')

    <h1 class="text-center">Create User</h1>
    <hr>
@stop

@section('content')

            <form method="POST" action="/admin">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="User name *" id="name" name="name" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email address *" id="email" name="email" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password *" id="password" name="password" required/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

@stop
