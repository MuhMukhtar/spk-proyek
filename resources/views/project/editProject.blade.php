@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Project</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('project.index') }}"> Back</a>

                    @if (Auth::user() && Auth::user()->is_admin == 1)
                        @if ($id->project_is_review == 1)
                            <form action="{{ route('project.projectComplete', $id->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to mark this project to complete?')">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Project Completed</button>
                            </form>
                        @endif
                    @endif
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

        <form action="{{ route('project.update', $id->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name</strong>
                        <select class="form-select" id="client_id" name="client_id" disabled>
                            <option selected="true" disabled="disabled" value="{{ $client->id }}">{{ $client->pt_name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Project Name</strong>
                        <input type="text" name="project_name" class="form-control" placeholder="the name of a project"
                            value="{{ $id->project_name }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Project Description</strong>
                        <input type="text" name="project_desc" class="form-control" placeholder="describe the project"
                            value="{{ $id->project_desc }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Project Duration (day)</strong>
                        <input type="number" name="project_duration" class="form-control"
                            value="{{ $id->project_duration }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Project Cost (IDR)</strong>
                        <input type="number" name="project_cost" class="form-control" value="{{ $id->project_cost }}"
                            required>
                    </div>
                </div>
                @if (Auth::user() && Auth::user()->is_admin == 1)
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Fabrication Load</strong>
                            <input type="number" name="project_load" class="form-control" value="{{ $id->project_load }}"
                                required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Difficulty</strong>
                            <input type="number" name="project_difficult" class="form-control"
                                value="{{ $id->project_difficult }}" required>
                        </div>
                    </div>
                @endif
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong>Project Document</strong>
                    <input type="file" class="form-control-file" name="file" id="file"
                        value="{{ 'storage/project/' . $id->project_document }}" accept=".pdf">
                    <br>
                    <iframe src="{{ asset('storage/project/' . $id->project_document) }}" width="50%" height="600">
                        This browser does not support PDFs. Please download the PDF to view it: <a
                            href="{{ asset('storage/project/' . $id->project_document) }}">Download PDF</a>
                    </iframe>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
