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

<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" id="logo" href="{{ route('home.index') }}">
            mYbLOG
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
            aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="" id="navbarExample01">

            <ul class=" collapse navbar-collapse navbar-nav justify-content-end">
                Bem Vindo(a), 
                @guest
                    Visitante
                    <li class="nav-item rounded-start bg-dark">
                        <a class="nav-link text-light" href="{{ route('auth.index') }}">Sign In</a>
                    </li>
                    <li class="nav-item rounded-end bg-secondary">
                        <a class="nav-link text-light" href="{{ route('user.create') }}">Sign Up</a>
                    </li>
                @endguest

                @auth
                    <span class="fw-bold p-1">{{ auth()->user()->UserFullname }}</span>
                    <li class="nav-item bg-dark rounded">
                        <a class="nav-link text-light" href="{{ route('auth.logout') }}">Logout</a>
                    </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>
