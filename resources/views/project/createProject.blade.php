@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>New Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('client.index') }}"> Back</a>
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

    <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name</strong>
                    <select class="form-select" id="client_id" name="client_id">
                        <option selected="true" disabled="disabled">Choose...</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" name="client_id">{{ $client->pt_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Name</strong>
                    <input type="text" name="project_name" class="form-control" placeholder="the name of a project" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Description</strong>
                    <input type="text" name="project_desc" class="form-control" placeholder="describe the project" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Project Document</strong>
                <input type="file" class="form-control" name="file" id="file">
              </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Duration (day)</strong>
                    <input type="number" name="project_duration" class="form-control" placeholder="estimated project completion time" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Cost (IDR)</strong>
                    <input type="number" name="project_cost" class="form-control" placeholder="project cost estimate" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
