<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container"><img src="img/logo.png" style="max-height: 50px" alt="">
        <a class="navbar-brand" href="#">Secret <strong>Land</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                            {{ auth()->user()->nama }}
                        @endauth

                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                            {{-- <li><a class=href="/logout">Logout</a></li> --}}
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
