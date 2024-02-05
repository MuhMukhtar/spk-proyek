@extends('layouts.app')

@section('content')
    <div class="container" style="width: 25%">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Bobot Kriteria</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('perhitungan.index') }}"> Back</a>
                </div>
            </div>
        </div>

        <br><br><br>

        <form name="bobotForm" action="{{ route('bobot.update', $id->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Duration</strong>
                        <input id="duration" type="text" name="duration" class="form-control"
                            value="{{ $id->bobot_duration }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Cost</strong>
                        <input type="text" name="cost" class="form-control" value="{{ $id->bobot_cost }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fabrication Load</strong>
                        <input type="text" name="load" class="form-control" value="{{ $id->bobot_load }}" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Difficult</strong>
                        <input type="text" name="difficult" class="form-control" value="{{ $id->bobot_difficult }}"
                            required>
                    </div>
                </div>
                <br><br><br>

                @if(Session::has('alert'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('alert') }}
                </div>
                @endif
                
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>
@endsection
