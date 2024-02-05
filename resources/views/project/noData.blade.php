@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tidak Ada Data Tersedia</div>

                    <div class="card-body text-center">
                        <p class="text-muted">Maaf, saat ini tidak ada data yang tersedia.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
