@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('reviewProject.update', $id->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 row">
                <label for="projectName" class="col-sm-2 col-form-label">Project</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="projectName"
                        value="{{ $id->project_name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="companyName" class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="companyName"
                        value="{{ $client->pt_name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="desc" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="desc"
                        value="{{ $id->project_desc }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="document" class="col-sm-2 col-form-label">Document</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="document"
                        value="{{ $id->project_document }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="document" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <iframe src="{{ asset('storage/project/' . $id->project_document) }}" width="50%" height="600">
                        This browser does not support PDFs. Please download the PDF to view it: <a
                            href="{{ asset('storage/project/' . $id->project_document) }}">Download PDF</a>
                    </iframe>
                </div>
            </div>
            <div class="row mb-3">
                <label for="durationField" class="col-sm-2 col-form-label">Duration (DAY)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="durationField" name="project_duration"
                        value="{{ $id->project_duration }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="costField" class="col-sm-2 col-form-label">Cost (IDR)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="costField" name="project_cost"
                        value="{{ $id->project_cost }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="loadField" class="col-sm-2 col-form-label">Fabrication Load (TON)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="loadField" name="project_load"
                        value="{{ $id->project_load }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="difficultField" class="col-sm-2 col-form-label">Difficult (1 - 10)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="difficultField" min="0" max="10"
                        name="project_difficult" value="{{ $id->project_difficult }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" value="1"
                            name="project_is_review">
                        <label class="form-check-label" for="gridCheck1">
                            Has been reviewed
                        </label>
                    </div>
                    <strong class="text-danger">Only check if it has been reviewed!</strong>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
