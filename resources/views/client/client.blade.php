@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-outline-success" href="{{ route('client.create') }}"> +Add Client</a>
        <br><br>
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Person in Charge</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr class="bg-light text-dark">
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->pt_name }}</td>
                        <td>{{ $client->person_name }}</td>
                        <td>{{ $client->contact_number }}</td>
                        <td>
                            <form action="{{ route('client.destroy', $client->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this client?')">
                                <a class="btn btn-warning" href="{{ route('client.edit', $client->id) }}">Edit</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
