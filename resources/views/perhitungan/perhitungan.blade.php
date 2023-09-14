@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="list-group text-center" style="margin-left: auto; margin-right: auto;">
                <li class="list-group-item active">BOBOT | 
                    <a href="{{ route('bobot.edit', $bobot->id) }}">
                        <ion-icon name="create"
                            style="display: inline-block; font-size: 24px; color: yellow; vertical-align: middle;"></ion-icon>
                    </a>
                </li>
                <li class="list-group-item">Duration : {{ $bobot->bobot_duration }}</li>
                <li class="list-group-item">Cost : {{ $bobot->bobot_cost }}</li>
                <li class="list-group-item">Load : {{ $bobot->bobot_load }}</li>
                <li class="list-group-item">Difficult : {{ $bobot->bobot_difficult }}</li>
        </ul>
    </div>
    <br>

    <div class="bg-light container px-4 text-center">
        <div class="row gx-5">

            {{-- Original --}}
            <div class="col">
                <div class="p-3">
                    <table class="table table-hover" style="margin-left: auto; margin-right: auto;">
                        <caption class="text-primary">Table Original</caption>
                        <thead>
                            <tr>
                                {{-- <th scope="col">Id</th> --}}
                                <th scope="col">Project Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Load</th>
                                <th scope="col">Difficult</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perhitungan as $d)
                                <tr>
                                    {{-- <th scope="row">{{ $d->id }}</th> --}}
                                    <td>{{ $d->project_name }}</td>
                                    <td>{{ $d->duration }}</td>
                                    <td>{{ $d->cost }}</td>
                                    <td>{{ $d->load }}</td>
                                    <td>{{ $d->difficult }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Skor --}}
            <div class="col">
                <div class="p-3">
                    <table class="table table-hover" style="margin-left: auto; margin-right: auto;">
                        <caption class="text-primary">Pembobotan Skor</caption>
                        <thead>
                            <tr>
                                {{-- <th scope="col">Id</th> --}}
                                <th scope="col">Project Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Load</th>
                                <th scope="col">Difficult</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perhitungan as $d)
                                <tr>
                                    {{-- <th scope="row">{{ $d->id }}</th> --}}
                                    <td>{{ $d->project_name }}</td>
                                    <td>{{ $d->duration_skor }}</td>
                                    <td>{{ $d->cost_skor }}</td>
                                    <td>{{ $d->load_skor }}</td>
                                    <td>{{ $d->difficult_skor }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Utility --}}
            <div class="col">
                <div class="p-3">
                    <table class="table table-hover" style="margin-left: auto; margin-right: auto;">
                        <caption class="text-primary">Nilai Utility</caption>
                        <thead>
                            <tr>
                                {{-- <th scope="col">Id</th> --}}
                                <th scope="col">Project Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Load</th>
                                <th scope="col">Difficult</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perhitungan as $d)
                                <tr>
                                    {{-- <th scope="row">{{ $d->id }}</th> --}}
                                    <td>{{ $d->project_name }}</td>
                                    <td>{{ $d->duration_utility }}</td>
                                    <td>{{ $d->cost_utility }}</td>
                                    <td>{{ $d->load_utility }}</td>
                                    <td>{{ $d->difficult_utility }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Perhitungan nilai utility x bobot --}}
            <div class="col">
                <div class="p-3">
                    <table class="table table-hover" style="margin-left: auto; margin-right: auto;">
                        <caption class="text-primary">Perhitungan nilai utility x bobot</caption>
                        <thead>
                            <tr>
                                {{-- <th scope="col">Id</th> --}}
                                <th scope="col">Project Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Load</th>
                                <th scope="col">Difficult</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perhitungan as $d)
                                <tr>
                                    {{-- <th scope="row">{{ $d->id }}</th> --}}
                                    <td>{{ $d->project_name }}</td>
                                    <td>{{ $d->duration_ut_bobot }}</td>
                                    <td>{{ $d->cost_ut_bobot }}</td>
                                    <td>{{ $d->load_ut_bobot }}</td>
                                    <td>{{ $d->difficult_ut_bobot }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Perhitungan nilai Akhir --}}
            <div class="col">
                <div class="p-3">
                    <table class="table table-hover" style="margin-left: auto; margin-right: auto;">
                        <caption class="text-primary">Nilai Akhir</caption>
                        <thead>
                            <tr>
                                {{-- <th scope="col">Id</th> --}}
                                <th scope="col">Project Name</th>
                                <th scope="col">Client</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Cost</th>
                                <th scope="col">Load</th>
                                <th scope="col">Difficult</th>
                                <th class="bg-primary" scope="col">Nilai Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perhitungan as $d)
                                <tr>
                                    {{-- <th scope="row">{{ $d->id }}</th> --}}
                                    <td>{{ $d->project_name }}</td>
                                    <td>{{ $d->pt_name }}</td>
                                    <td>{{ $d->duration_ut_bobot }}</td>
                                    <td>{{ $d->cost_ut_bobot }}</td>
                                    <td>{{ $d->load_ut_bobot }}</td>
                                    <td>{{ $d->difficult_ut_bobot }}</td>
                                    <td class="bg-primary">{{ $d->nilai_akhir }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ENd Table --}}
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
