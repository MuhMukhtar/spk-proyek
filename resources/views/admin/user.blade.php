@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-outline-success" href="{{ route('user.create') }}"> +Add User</a>
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
                @foreach ($users as $user)
                    <tr class="bg-light text-dark">
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
                                <button type="submit" class="btn btn-warning" disabled>Edit</button>
                                <button type="submit" class="btn btn-danger" disabled>Delete</button>
                            @else
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    <a class="btn btn-warning" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
