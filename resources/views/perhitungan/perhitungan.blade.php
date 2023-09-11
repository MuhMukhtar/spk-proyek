@extends('layouts.app')

@section('content')
    <div class="bg-light container px-4 text-center">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3">
                    <table class="table table-borderless table-hover" style="margin-left: auto; margin-right: auto;">
                        <caption>Table Original</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Load</th>
                                <th scope="col">Difficult</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($projects as $project) --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>E</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>E</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col">
                <div class="p-3">
                    <table class="table table-borderless table-hover" style="margin-left: auto; margin-right: auto;">
                        <caption>Table Skor</caption>
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Project Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Load</th>
                                <th scope="col">Difficult</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($projects as $project) --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>E</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>E</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
