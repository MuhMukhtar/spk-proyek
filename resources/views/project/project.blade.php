@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a class="btn btn-outline-success" href="/"> Input Barang</a>
        <br><br>
    <table class="table">
        <thead>
            <tr class="bg-primary text-white">
                <th scope="col">Id</th>
                <th scope="col">Project Name</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Document</th>
                <th scope="col">Duration</th>
                <th scope="col">Costs</th>
                <th scope="col">Fabrication Load</th>
                <th scope="col">Difficulty</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Muhammad Mukhtar</td>
                <td>mukhtar</td>
                <td>Muhammad Mukhtar</td>
                <td>mukhtar</td>
                <td>Admin</td>
                <td>Muhammad Mukhtar</td>
                <td>mukhtar</td>
                <td>Admin</td>                
                <td>
                    <a href="{{ route('editProject.index') }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </a>
                </td>
            </tr>
            {{-- @foreach ($barangs as $item)
                <tr class="bg-secondary text-white">
                    <th scope="row">{{ $item->id_barang }}</th>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori_barang }}</td>
                    <td>{{ $item->harga_barang }}</td>
                    <td>{{ $item->qty_barang }}</td>
                    <td>
                        <button type="button" class="btn btn-warning">Edit</button>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
    </div>
@endsection