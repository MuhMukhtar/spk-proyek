@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-outline-success" href="{{ route('project.create') }}">Input Project</a>
        <br><br>
        <table class="table">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="text-center" scope="col">Id</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Client</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="bg-light text-dark">
                        <th class="text-center" scope="row">{{ $project->id }}</th>
                        <td>{{ $project->project_name }}</td>
                        {{-- <td>{{ $project->project_desc }}</td> --}}
                        <td>{{ Str::limit($project->project_desc, 40) }}</td>
                        <td>{{ $project->pt_name }}</td>
                        <td class="text-center">
                            @if ($project->project_is_review == 1)
                                <ion-icon name="checkmark-circle-outline"
                                    style="display: inline-block; font-size: 24px; color: rgb(20, 144, 20); vertical-align: middle;"></ion-icon>
                                <span style="display: inline-block; vertical-align: middle;">Reviewed</span>
                            @elseif ($project->project_is_review == 2)
                                <ion-icon name="checkmark-done-circle-outline"
                                    style="display: inline-block; font-size: 24px; color: rgb(32, 67, 255); vertical-align: middle;"></ion-icon>
                                <span style="display: inline-block; vertical-align: middle;">Completed</span>
                            @else
                                <ion-icon name="close-circle-outline"
                                    style="display: inline-block; font-size: 24px; color: #cc3636; vertical-align: middle;"></ion-icon>
                                <span style="display: inline-block; vertical-align: middle;">Not yet reviewed</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this project?')">
                                <a class="btn btn-info" href="{{ route('project.show', $project->id) }}">Show</a>
                                @if ($project->project_is_review == 1)
                                    @if (Auth::user() && Auth::user()->is_admin == 1)
                                        <a class="btn btn-warning" href="{{ route('project.edit', $project->id) }}">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    @else
                                        <a class="btn btn-warning disabled"
                                            href="{{ route('project.edit', $project->id) }}">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger disabled">Delete</button>
                                    @endif
                                @elseif ($project->project_is_review == 2)
                                    <a class="btn btn-warning disabled"
                                        href="{{ route('project.edit', $project->id) }}">Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                @else
                                    <a class="btn btn-warning" href="{{ route('project.edit', $project->id) }}">Edit</a>
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
