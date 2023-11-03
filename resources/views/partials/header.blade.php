<style>
    #intro {
        margin-top: 58px;
    }

    @media (max-width: 991px) {
        #intro {
            margin-top: 45px;
        }
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" id="logo" href="{{ route('home.index') }}">
            mYbLOG
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="" id="navbarExample01">

            <ul class=" collapse navbar-collapse navbar-nav justify-content-end">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="{{ route('home.index') }}">Home</a>
                </li>
                @guest
                    <li class="nav-item rounded-start bg-dark">
                        <a class="nav-link text-light" href="">Sign In</a>
                    </li>
                    <li class="nav-item rounded-end bg-secondary">
                        <a class="nav-link text-light" href="h">Sign Up</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item ">
                        <a class="nav-link " href="h">Logout</a>
                    </li>
                @endauth

            </ul>

            {{-- <ul class="navbar-nav d-flex flex-row">
                <!-- Icons -->
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="" 
                        target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href=""  target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href=""  target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href=""  target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>
<!-- Navbar -->
