<nav class="navbar nav-login fixed-top navbar-expand-lg " data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">Cofe Journey</a>
        <div id="navbarNavAltMarkup">
            <div class="nav">
                @auth
                    <span class="nav-link active" aria-current="page">Profil
                        <b>{{ auth()->user()->name }}</b></span>
                @else
                    <a class="nav-link active  text-white" href="/login">Login</a>
                    <a class="nav-link active text-white" href="/register">Daftar</a>
                @endauth

            </div>
        </div>
    </div>
</nav>
