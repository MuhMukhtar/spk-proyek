@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-outline-success" href="{{ route('createUser.index') }}"> +Add User</a>
        <br><br>
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                <td>1</td>
                <td>Muhammad Mukhtar</td>
                <td>mukhtar</td>
                <td>Admin</td>
                <td>
                    <a href="{{ route('editUser.index') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </a>
                </td>
            </tr> --}}
                @foreach ($users as $user)
                    <tr class="bg-secondary text-white">
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if ($user->is_admin == 1)
                                Admin
                            @else
                                Marketing
                            @endif
                        </td>
                        <td>
                            @if ($user == Auth::user())
                                <button type="button" class="btn btn-warning">Edit</button>
                            @else
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
