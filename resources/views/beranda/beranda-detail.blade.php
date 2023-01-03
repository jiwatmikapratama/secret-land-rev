@extends('layouts.user.user-main')

@section('content')
    @include('partials.break')
    <div class="container pt-5">
        <div class="row g-0 pt">
            <div class="col-md-8 border-right">

                <!-- menu kanan -->
                <div class="row">
                    <div class="col-md-10" style="word-wrap: break-word;  ">
                        <div class="feed-dass">
                            @foreach ($DesaList->wisata as $das)
                                <h3>{{ $loop->iteration }}. Wisata {{ $das->nama }}</h3>

                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($das->gambar as $image)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img class="d-block w-100" src="{{ asset('/wisata/' . $image) }}"
                                                    style="max-height: 2000px; max-width: ;" alt="multiple image"
                                                    class="w-20 h-20 border border-blue-600">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <p style="text-align: justify;">{{ $das->deskripsi }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 px-3">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15784.825320104805!2d115.20077264999999!3d-8.47930815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd223a2370ad711%3A0x67e24a91a80b66ec!2sGriya%20Dauh%20Manuaba%20Cau%20Belayu!5e0!3m2!1sid!2sid!4v1672745363703!5m2!1sid!2sid"
                    width="100%" height="160" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" frameborder="0"></iframe>
            </div>
        </div>
    </div>
@endsection


{{-- 


<!doctype html>
<html lang="">

<head>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font atau icon CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesgeet"
        href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <!-- css -->
    <link href="signin.css" rel="stylesheet">
    <link href="css/detail.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">


    <title> Halaman Detail</title>
</head>

<body class="profile-page">
    <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top  navbar-expand-lg " color-on-scroll="100"
        id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/dashboard"><i class="fa-solid fa-arrow-left"></i></i> </a>

            </div>
        </div>
    </nav>

    <div class="page-header header-filter" data-parallax="true" style="background-image:url('img/img2.jpg');"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">
                            <div class="name">
                                <h1 class="title">Desa {{ $DesaList->nama }}</h1>

                            </div>
                        </div>
                    </div>
                    <p style="text-align: justify; text-indent: 0.5in;">{{ $DesaList->deskripsi }}</p>
                </div>

                <br>
                <!-- menu kiri -->
                <div class="container">
                    <div class="row g-0 pt">

                        <div class="col-md-8 border-right">

                            <!-- menu kanan -->
                            <div class="feed-dass ">
                                @foreach ($DesaList->wisata as $das)
                                    <h3>{{ $loop->iteration }}. Wisata {{ $das->name }}</h3>
                                    <img src="{{ asset('daerah/' . $das->gambar) }}" style="height: auto; width: 100%;"
                                        alt="">

                                    <br><br>
                                    <p style="text-align: justify; text-indent: 0.5in;">{{ $das->deskripsi }}</p>
                                @endforeach
                            </div>

                        </div>

                        <!-- menu kanan -->
                        {{-- <div class="col-md-4 px-3">
                            <div class="menu-kanan" style="position: sticky; top: 20px;">
                                <div class="kalender border-bottom">
                                    <iframe
                                        src="https://calendar.google.com/calendar/embed?src=adiaksa%40undiksha.ac.id&ctz=Asia%2FMakassar"
                                        style="border: 0" width="100%" height="260" frameborder="0"
                                        scrolling="no"></iframe>
                                </div>
                                <div class="map mt-2 border-bottom">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1010295.996606638!2d114.51106531102594!3d-8.453713789473323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd141d3e8100fa1%3A0x24910fb14b24e690!2sBali!5e0!3m2!1sen!2sid!4v1639068139544!5m2!1sen!2sid"
                                        width="100%" height="160" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                                </div>
                            </div>
                        </div> --}}
</div>



<!-- js -->


</div>
</div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
    integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
    integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
</script>


</body>

</html> --}}
