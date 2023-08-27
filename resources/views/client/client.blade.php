@extends('layouts.app')

@section('content')
    <a class="btn btn-outline-success" href="{{ route('createClient.index') }}"> +Add Client</a>
    <br><br>
    <table class="table">
        <thead>
            <tr class="bg-primary text-white">
                <th scope="col">Id</th>
                <th scope="col">Company Name</th>
                <th scope="col">Person Responsible</th>
                <th scope="col">Contact Person</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
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
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this user?')">
                                <a class="btn btn-warning" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" disabled>Delete</button>
                            </form>
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
@endsection
