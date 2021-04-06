<nav class="navbar navbar-expand-lg navbar-light rounded-bottom" style="background-color: #ffe600;">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="https://412292.smushcdn.com/560079/wp-content/uploads/sites/81/2020/07/cropped-LogoIFLABWEbsite-1-3.png?lossy=1&strip=1&webp=1"
                alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            @if (session()->has('name'))
            <div class="dropdown">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{session()->get('name')}}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                </div>
            </div>

            @else
            <form class="form-inline">
                <a href="{{route('login')}}"><button class="btn btn-outline-dark mr-sm-2"
                        type="button">Login</button></a>
                <a href="{{route('register')}}"><button class="btn btn-dark" type="button">Join Now</button></a>
            </form>
            @endif
        </div>
    </div>
</nav>