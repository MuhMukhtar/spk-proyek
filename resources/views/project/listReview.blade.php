@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
                    <th scope="col">Id</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Client</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="bg-light text-dark">
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ Str::limit($project->project_desc, 40); }}</td>
                        <td>{{ $project->pt_name }}</td>
                        <td class="text-center">
                            <a class="btn btn-warning" href="{{ route('reviewProject.edit', $project->id) }}">Review</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
