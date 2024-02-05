@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col">
            <div class="p-3">
                <h2>Ranking Prioritas Project</h2>
                <table class="table table-hover user-select-none" style="margin-left: auto; margin-right: auto;">
                    {{-- <caption class="text-primary">Nilai Akhir</caption> --}}
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Client</th>
                            <th class="text-center" scope="col">Duration</th>
                            <th class="text-center" scope="col">Cost</th>
                            <th class="text-center" scope="col">Load</th>
                            <th class="text-center" scope="col">Difficult</th>
                            <th class="bg-primary text-center" scope="col">Nilai Akhir</th>
                            {{-- <th class="bg-primary text-center" scope="col">Show Detail</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($perhitungan as $d)
                            <tr>
                                <th scope="row" onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $i++ }}</th>
                                <td onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $d->project_name }}</td>
                                <td onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $d->pt_name }}</td>
                                <td class="text-center"
                                    onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $d->duration_ut_bobot }}</td>
                                <td class="text-center"
                                    onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $d->cost_ut_bobot }}</td>
                                <td class="text-center"
                                    onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $d->load_ut_bobot }}</td>
                                <td class="text-center"
                                    onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $d->difficult_ut_bobot }}</td>
                                <td class="bg-primary text-center"
                                    onclick="window.location='{{ route('project.show', $d->project_id) }}'">
                                    {{ $d->nilai_akhir }}</td>
                                {{-- <td class="bg-primary text center"><a
                                        href="{{ route('project.show', $d->project_id) }}"><ion-icon
                                            name="document-text-outline"></ion-icon></a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection
