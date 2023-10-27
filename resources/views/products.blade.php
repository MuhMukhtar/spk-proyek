@extends('layouts.app')

@section('content')
    <img style="width: 100%; height: auto; filter: brightness(70%)" src="{{ url('/img/gambar1.jpg') }}" class="mx-auto d-block"
        alt="...">
    <br>
    <div class="container text-center">
        <h1 style="color: #0174BE">Produk dan Solusi</h1>
        <h4>Baltec IES menyediakan layanannya untuk seluruh siklus kehidupan proyek: mulai dari penelitian dan pengembangan,
            desain dan penyusunan hingga penyelesaian praktikal.</h4>
        <br>
        <h4>Tim purna jual kami memberikan dukungan penuh selama produk kami masih bekerja, serta pelaksanaan proyek
            retrofit dan pasokan suku cadang.</h4>
        <br><br>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/img/baltec-design.png') }}" class="card-img-top" alt="design">
                    <div class="card-body">
                        <h5>DESAIN</h5>
                        <p class="card-text">Metodologi desain kami yang telah terbukti berfokus pada penciptaan produk yang
                            fungsional dan canggih. Dari penelitian dan penilaian kelayakan hingga desain detail dan
                            perencanaan produksi, kami
                            menawarkan solusi khusus untuk kebutuhan spesifik proyek dan mengikuti semua standar
                            internasional yang berlaku.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/img/baltec-management.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <H5>PROJECT MANAGEMENT</H5>
                        <p class="card-text">Tim manajer proyek kami mengarahkan pelaksanaan proyek sesuai pedoman PMI,
                            melalui perencanaan, pelaksanaan, manajemen sumber daya, pengadaan, pemantauan, dan kontrol.

                            Proses kami yang telah terbukti, menjamin bahwa setiap proyek akan dilaksanakan menggunakan
                            standar kualitas yang ketat, tepat waktu dan sesuai anggaran, sehingga tingkat kepuasan
                            pelanggan tercapai.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/img/baltec-manufacturing.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>MANUFACTURING</h5>
                        <p class="card-text">Di mana pun proyek berada, terlepas dari ukuran atau kerumitannya, kami
                            membangun peralatan Anda di tempat yang paling nyaman dan terdekat dengan lokasi. Manufaktur
                            dimungkinkan di seluruh 5 benua.
                            Semua pabrik kami memiliki sertifikasi kualitas yang paling didambakan di industri ini, termasuk
                            ISO 9001, ASME, AISC, AWS, antara lain. Kontrol kualitas dan inspeksi yang konstan adalah kunci
                            kesuksesan kami.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/img/baltec-delivery.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>DELIVERY</h5>
                        <p class="card-text">Lokasi bengkel kami yang nyaman dan dekat dengan pelabuhan serta prosedur
                            pengemasan yang memungkinkan pengurangan waktu pengiriman secara signifikan dan kerusakan pada
                            peralatan Anda. Kami memiliki pengetahuan dan pengalaman khusus untuk melakukan pengiriman impor
                            maupun ke site (local) pelabuhan, sesuai permintaan.
                            Kami juga dapat merakit dan mengirimkan peralatan (mis. Diverter damper) dalam satu bagian,
                            sehingga meminimalkan waktu ereksi di site.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/img/baltec-erection.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>ERECTION / COMMISSIONING</h5>
                        <p class="card-text">Kami menyediakan layanan pemasangan untuk peralatan kami: mulai dari peninjauan
                            jadwal konstruksi dan struktur organisasi pekerja proyek hingga memantau kemajuan konstruksi
                            secara keseluruhan, pengawasan, pemeriksaan kualitas, dan perbaikan akhir.
                            Personel dan penyelia kami juga dapat berada di lokasi site untuk melakukan pekerjaan
                            commissioning dan memberikan dukungan selama proses pengetesan alat dimulai.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/img/baltec-maintenance.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5>AFTER SALES / MAINTENANCE</h5>
                        <p class="card-text">Hubungan kami dengan klien kami tidak berhenti setelah peralatan yang
                            disediakan menyala dan berjalan. Baltec IES menjamin aliran suku cadang yang konstan sesuai
                            kebutuhan, termasuk dukungan teknis dari para ahli kami.
                            Kami juga menawarkan layanan konsultasi untuk mengoptimalkan peralatan Anda, serta inspeksi di
                            tempat dan jadwal perawatan rutin untuk menjamin fungsinya seiring waktu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
