@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Profile</h2>
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

        <form action="{{ route('editProfile.update', $id->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name"
                            value="{{ $id->name }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Username:</strong>
                        <input type="text" name="username" class="form-control" placeholder="Username"
                            value="{{ $id->username }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label><strong>Role:</strong></label>
                    <strong class="text-danger">You can't change roles on yourself</strong>
                    <div class="form-group">
                        @if ($id == Auth::user())
                            @if ($id->is_admin == '1')
                                <input type="radio" name="is_admin" value="1" checked>Admin
                                <input disabled type="radio" name="is_admin" value="0">Marketing
                            @else
                                <input disabled type="radio" name="is_admin" value="1">Admin
                                <input type="radio" name="is_admin" value="0" checked>Marketing
                            @endif
                        @else
                            @if ($id->is_admin == '1')
                                <input type="radio" name="is_admin" value="1" checked>Admin
                                <input type="radio" name="is_admin" value="0">Marketing
                            @else
                                <input type="radio" name="is_admin" value="1">Admin
                                <input type="radio" name="is_admin" value="0" checked>Marketing
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
