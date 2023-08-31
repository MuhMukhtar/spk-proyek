@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-outline-success" href="/"> Input Barang</a>
        <br><br>
    <table class="table">
        <thead>
            <tr class="bg-primary text-white">
                <th scope="col">Id</th>
                <th scope="col">Project Name</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Document</th>
                <th scope="col">Duration</th>
                <th scope="col">Costs</th>
                <th scope="col">Fabrication Load</th>
                <th scope="col">Difficulty</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr class="bg-secondary text-white">
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->project_name }}</td>
                    <td>{{ $project->project_desc }}</td>
                    <td>{{ $project->client_id }}</td>
                    <td>{{ $project->project_document }}</td>
                    <td>{{ $project->project_duration }}</td>
                    <td>{{ $project->project_cost }}</td>
                    <td>{{ $project->project_load }}</td>
                    <td>{{ $project->project_difficult }}</td>
                    <td>
                        <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this project?')">
                            <a class="btn btn-warning" href="{{ route('project.edit', $project->id) }}">Edit</a>
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