<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('website.home') }}">CryptoChecker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tbot') }}">Telegram Bots</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('airdrops') }}">Airdrops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.us') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about.us') }}">About Us</a>
                </li>
            </ul>
            {{-- <div class="d-flex">
                <button class="btn-login" href="{{ route('login') }}">Login</button>
                <button class="btn-signup" href="{{ route('signup') }}">Sign Up</button>
            </div> --}}
            <div class="d-flex">
                <a class="btn btn-login me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-signup" href="{{ route('signup') }}">Sign Up</a>
            </div>
        </div>
    </div>
</nav>


{{-- <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CryptoChecker</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Telegram Bots</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Airdrops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn-login">Login</a>
                <a href="{{ route('register') }}" class="btn-signup">Sign Up</a>
            </div>
        </div>
    </div>
</nav>
 --}}