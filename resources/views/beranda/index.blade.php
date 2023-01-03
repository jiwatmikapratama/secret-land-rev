@extends('layouts.user.user-main')

@section('content')
    {{-- slide --}}
    <header class="flex">
        <div class="container"><br><br><br>
            <div class="header-title">
                <h1>Cari Suasana Baru</h1>
                <p>Kami menawarkan solusi yang menjembatani Instansi daerah lebih tepatnya desa yang ingin
                    mengembangkan atau mempublikasikan desanya agar dikenal luas seNusantara maupun Internasional.</p>
            </div>
            <div class="header-form2">
                <h2>Pilih Daerah & Destinasi Wisata</h2>
                <form action="/beranda-search" method="GET">
                    <input type="search" name="search" class="form-control2" placeholder="search">
                    <button class="btn btn-outline-light" type="submit"><i class="fa fa-search"></i></button>
                </form>
                <form action="">

                    {{-- <select name="" id="" class="form-control2" placeholder="Keyword search">
                        <option value="{{ old('fk_id_kabupaten') }}">--Pilih--</option>

                        @foreach ($KabupatenList as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                        <input type="submit" class="btn btn-primary" placeholder="search"> --}}
                </form>
                <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">

                    <div class="row" data-aos="fade-up">
                        @foreach ($KategoriList as $kategori)
                            <div class="col">
                                <button class="btn tombol"><a href="">{{ $kategori->nama }}</a></button>
                            </div>
                        @endforeach

                        <div class="col">

                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <div class="gg">
        <div class="container" data-aos="fade-up">

            {{-- Wisata --}}
            <div class="section-title">
                <h2>REKOMENDASI WISATA</h2>
                <p>Wisata yang cocok untuk anda kunjungi</p>
                <hr>
                <div class="row d" data-aos="fade-up">
                    @foreach ($WisataList as $wisata)
                        <div class="col">
                            <a href="beranda-detail/{{ $wisata->id }}">
                                <div class="card2">
                                    <img src="{{ asset('wisata/' . json_decode($wisata->gambar)[0]) }}" class="card-image2"
                                        alt="...">
                                    <div class="card-body2">
                                        <h5 class="card-titlet" style="font-weight:bold;"> {{ $wisata->nama }}</h5>
                                        <h5 style="font-size:15px;">{{ $wisata->desa->nama }}</h5>
                                        {{-- <p class="card-text">{{ Str::of($wisata->deskripsi)->limit(20) }}</p> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

                <div class="col-md-3 pull-right mt-3" style="">
                    {{ $WisataList->links() }}
                </div>
            </div>

            @include('partials.break')

            {{-- Desa --}}
            <div class="section-title">
                <h2>REKOMENDASI DESA</h2>
                <p>Desa yang cocok untuk anda kunjungi</p>
                <hr>
                <div class="row d" data-aos="fade-up">
                    @foreach ($DesaList as $desa)
                        @if ($desa->status == 'approve')
                            <div class="col">
                                <a href="beranda-detail/{{ $desa->id }}">
                                    <div class="card2">
                                        <img src="{{ asset('daerah/' . $desa->gambar) }}" class="card-image2"
                                            alt="...">
                                        <div class="card-body2">
                                            <h5 class="card-titlet" style="font-weight:bold;"> {{ $desa->nama }}</h5>
                                            <h5 style="font-size:15px;">{{ $desa->kabupaten->nama }}</h5>
                                            {{-- <p class="card-text">{{ Str::of($wisata->deskripsi)->limit(20) }}</p> --}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-3 pull-right mt-3" style="">
                    {{ $DesaList->links() }}
                </div>
            </div>



            <br><br><br><br>
            {{-- end card --}}

            {{-- contact --}}
            <!-- ======= Bagian Contact ======= -->
            <section id="contact" class="contact mb-5 ">

                <div class="section-title">
                    <h2>KONTAK</h2>
                    <p>Jika ingin menghubungi saya silakan melihat data saya dibawah ini!</p>
                    <hr>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="g col-lg-6">
                        <div class="info-box mb-4">
                            <i class="uil uil-location-point icon"></i>
                            <h3>Alamat Saya</h3>
                            <p>Bondalem, Kec. Tejakula, Kabupaten Buleleng, Bali</p>
                        </div>
                    </div>

                    <div class="g col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="uil uil-envelopes icon"></i>
                            <h3>Email saya</h3>
                            <p>programerbiasa@gmail.com</p>
                        </div>
                    </div>

                    <div class="g col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="uil uil-phone-volume icon"></i>
                            <h3>Nomor saya</h3>
                            <p>+62 8191 6601 444</p>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-md-5 mt-5">
                        <a href="/daftar-wisata" class="button rounded-pill shadow tebel-sedang">DAFTAR WISATA YANG
                            BELUM
                            ADA</a>
                    </div>
                    <div class="col-md-5 mt-5">
                        <a href="/daftar-desa" class="button rounded-pill shadow tebel-sedang">DAFTAR DESA YANG
                            BELUM
                            ADA</a>
                    </div>
                </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

            {{-- <div class="g col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d63196.35783373603!2d115.3133908!3d-8.1246437!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2dd1ed1c15eb2017%3A0x5030bfbca830b40!2sBondalem%20Tejakula%20Buleleng%20Regency%20Bali!3m2!1d-8.1246437!2d115.3133908!5e0!3m2!1sid!2sid!4v1659859260771!5m2!1sid!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div> --}}

            {{-- <div class="col-md-6 mt-5">
                    <a href="/beranda" class="button rounded-pill shadow tebel-sedang">DAFTAR DESA YANG BELUM ADA</a>
                </div> --}}
            {{-- @include('partials.user.form-daftar-wisata') --}}

        </div>
    </div>
@endsection
