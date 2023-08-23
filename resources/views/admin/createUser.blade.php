@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- <form action="{{ route('createUser.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            <label for="is_admin" class="form-label" required>Role</label>
            <div class="form-check">
                &nbsp;
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="is_admin" required
                    value="1">
                <label class="form-check-label" for="is_admin">
                    Admin
                </label>
                <br>
                &nbsp;
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="is_admin" value="0">
                <label class="form-check-label" for="is_admin">
                    Marketing
                </label>
            </div>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form> --}}

    <form action="{{ route('createUser.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username:</strong>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <label><strong>Role:</strong></label>
                <div class="form-group">
                    <input type="radio" name="is_admin" value="1">Admin
                    <input type="radio" name="is_admin" value="0">Marketing
                </div>
            </div>
            {{-- <div class="form-check">
                &nbsp;
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="is_admin" required
                    value="1">
                <label class="form-check-label" for="is_admin">
                    Admin
                </label>
                <br>
                &nbsp;
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="is_admin" value="0">
                <label class="form-check-label" for="is_admin">
                    Marketing
                </label>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
