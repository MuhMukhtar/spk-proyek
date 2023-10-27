@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ url('/img/gambar4.jpg') }}" class="d-block w-100"
                                style="height: 600px; filter: brightness(40%)" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Inlet Filter Houses</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('/img/gambar5.jpg') }}" class="d-block w-100"
                                style="width: auto; height: 600px; filter: brightness(40%)" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Peredam</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ url('/img/gambar6.jpg') }}" class="d-block w-100"
                                style="height: 600px; filter: brightness(40%)" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Guillotine Dampers</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <br><br>
        <h3 style="color: cadetblue">Memberikan Solusi untuk Industri Listrik Sejak 1987</h3>
        <p>Baltec Inlet & Exhaust Systems (Baltec IES) adalah perusahaan yang dimiliki dan dioperasikan berasal dari
            Australia yang menyediakan berbagai layanan untuk industri tenaga gas turbin. Perusahaan kami telah beroperasi
            sejak 1987 dan terus memperluas operasinya secara global.</p>
    </div>
@endsection
