@extends('layouts.user.user-main')

@section('content')
    {{-- slide --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/img1.jpg" class="d-block w-100" alt="img/img1.jpg">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/img1.jpg" class="d-block w-100" alt="img/img1.jpg">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/img1.jpg" class="d-block w-100" alt="img/img1.jpg">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- end slide --}}

    {{-- navb --}}
    <header id="navb" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <nav class="navbar1">
                <ul>
                    <li><a class="nav-link scrollto active " href="/">ALL</a></li>
                    @foreach ($KabupatenList as $kabupaten)
                        <li>
                            <a class="nav-link scrollto {{ $title === 'Kabupaten' ? 'active' : '' }} "
                                href="beranda/{{ $kabupaten->id }}">{{ $kabupaten->nama }}</a>
                        </li>
                    @endforeach
                </ul>

            </nav>

        </div>
    </header>
    {{-- endnavb --}}

    {{-- card --}}

    <div class="container b">
        <div class="row">
            <div class="col-md-3">
                <form class="d-flex ms-auto" action="beranda-search" method="GET">
                    <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search"
                        value="{{ $keyword != '' ? $keyword : ($keyword = '') }}">
                    <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-md-3">
                <form class="d-flex ms-auto" action="/beranda" method="GET">

                    <select id="" class="form-select" name="kabupaten_filter">
                        <option>Kabupaten</option>
                        @foreach ($KabupatenList as $kabupaten)
                            <option value="{{ $kabupaten->nama }}">{{ $kabupaten->nama }}</option>
                        @endforeach
                    </select>
                    <a href="/beranda" class="btn btn-primary">Filter</a>

                </form>
            </div>
            <div class="col-md-3">
                <form class="d-flex ms-auto" action="beranda" method="GET">
                    <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search"
                        value="{{ $keyword != '' ? $keyword : ($keyword = '') }}">
                    <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>


        <form class="d-flex ms-auto" action="beranda" method="GET">
            <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search"
                value="{{ $keyword != '' ? $keyword : ($keyword = '') }}">
            <button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="row">
            @foreach ($DesaList as $desa)
                <div class="col">
                    <div class="card" style="width: 404px;">
                        <img src="{{ asset('daerah/' . $desa->gambar) }}" style="height: 400px; width:400px;"
                            class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="font-weight:bold">{{ $desa->nama }}</h5>
                            <p class="card-text">{{ Str::of($desa->deskripsi)->limit(250) }}</p>
                            <a href="beranda-detail/{{ $desa->id }}" class="btn btn-primary">Cek Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <br><br>
    {{-- end card --}}

    {{-- contact --}}
    <!-- ======= Bagian Contact ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

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

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="g col-lg-6 ">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d63196.35783373603!2d115.3133908!3d-8.1246437!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x2dd1ed1c15eb2017%3A0x5030bfbca830b40!2sBondalem%20Tejakula%20Buleleng%20Regency%20Bali!3m2!1d-8.1246437!2d115.3133908!5e0!3m2!1sid!2sid!4v1659859260771!5m2!1sid!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                </div>

                <div class="g col-lg-6">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject"
                                placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>
        </div>
    @endsection
