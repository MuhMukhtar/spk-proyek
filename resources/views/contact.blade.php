@extends('layouts.app')

@section('content')
    <div class="row" style="background-color: #7E9BC3">
        <h1 class="text-center" style="color: white">KONTAK</h1>
        <div class="col-sm-8 p-3 mb-2">
            <img src="{{ url('/img/worldmap.jpg') }}" alt="">
        </div>
        <div class="col-4 p-3 mb-2">
            <h3 style="color: #f4cb9e">HUBUNGI KAMI</h3>
            <h5>KANTOR INDONESIA: +62 31 3990436</h5>
            <br><br>
            <h3 style="color: #f4cb9e">ATAU EMAIL</h3>
            <h5>info@baltecies.com</h5>
            <br><br>
            <h3 style="color: #f4cb9e">KANTOR PUSAT BALTEC</h3>
            <h5>10 Ferntree Place, Notting Hill
                VIC 3168 Melbourne, Australia</h5>
            <br><br>
            <h3 style="color: #f4cb9e">AGEN GLOBAL</h3>
            <h5>Untuk menghubungi salah satu kantor regional kami, silakan hubungi Kantor Pusat dan kami akan dengan senang
                hati mengarahkan pertanyaan Anda kepada orang yang tepat.</h5>
        </div>
    </div>
@endsection
