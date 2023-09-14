@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Project Detail</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="javascript:history.back()"> Back</a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="card mb-3 center">
                <div class="card-body">
                    <h3 class="card-title text-primary">{{ $projects->project_name }}</h3>
                    <h6 class="card-title text-secondary">Client: {{ $clients->pt_name }}</h6>
                    <br>
                    <p class="card-text">{{ $projects->project_desc }}</p>
                    <div class="form-group">
                        <strong>Variables:</strong>
                        <ul class="list-group">
                            <li class="list-group-item">Duration : {{ $projects->project_duration }}</li>
                            <li class="list-group-item">Cost : {{ $projects->project_cost }}</li>
                            <li class="list-group-item">Fabrication Load : {{ $projects->project_load }}</li>
                            <li class="list-group-item">Diificulty : {{ $projects->project_difficult }}</li>
                        </ul>
                        <br>
                    </div>
                    <iframe src="{{ asset('storage/project/' . $projects->project_document) }}" width="50%"
                        height="600">
                        This browser does not support PDFs. Please download the PDF to view it: <a
                            href="{{ asset('storage/project/' . $projects->project_document) }}">Download PDF</a>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
