@extends('layouts.welcome.welcome-main')

{{-- content --}}
@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 gambar">
                <img src="img/img1.jpg" width="100%">
            </div>
            <div class="col-sm-12 position-relative p-4">

                <div class="position-absolute top-0 end-0">
                    <img src="img/img1.jpg" class="img">
                </div>
                <h1 class="display-2 text-truncate tebel-banget"><b>Secret Land</b></h1>

                <div class="desc mt-4">
                    <p>Kami menawarkan solusi yang menjembatani Instansi daerah lebih tepatnya desa yang ingin
                        mengembangkan atau mempublikasikan desanya agar dikenal luas seNusantara maupun Internasional.
                    </p>
                </div>
                <div class="tombol mt-5">
                    <a href="#" class="button rounded-pill shadow tebel-sedang">DOWNLOAD</a>
                </div>
            </div>
        </div>
    </div>
@endsection
