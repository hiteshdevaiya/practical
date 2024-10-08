<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            </ul>

            @if ((!Request::is('login')) && (!Request::is('register')))
            <form class="d-flex">
                <a class="btn btn-outline-dark" href="{{ route('cart') }}">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{ Session::has('cart') ? count(session()->get('cart')) : 0 }}</span>
                </a>
            </form>
            @endif

            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('/') }}" class="btn btn-outline-dark m-2">
                            <i class="bi bi-speedometer2 me-1"></i>
                            Home
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-outline-dark" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="bi-box-arrow-in-left me-1"></i>
                            Logout
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-dark m-2">
                            <i class="bi-box-arrow-in-right me-1"></i>
                            Login
                        </a>

                        @if (Route::has('register'))
                            <a  href="{{ route('register') }}" class="btn btn-outline-dark">
                                <i class="bi bi-journal me-1"></i>
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>
</nav>
