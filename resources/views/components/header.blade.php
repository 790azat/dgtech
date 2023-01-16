<div class="col-12 bg-dark text-light" style="background: #eeeeee">
    <div class="container py-3 px-4 px-sm-2">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('welcome') }}" class="d-flex gap-2 align-items-center">
                <img src="{{ asset('images/logo.png') }}" style="width: 70px" alt="">
                <p class="fw-bold fs-2 align-self-end mt-2" style="font-size: 30px;font-family: Paladins"> tech</p>
            </a>
            <div class="d-flex align-items-center gap-3 ms-auto menu">
                @guest
                    <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket me-1"></i> Login</a>
                    <a href="{{ route('register') }}"><i class="fa-solid fa-user-circle me-1"></i> Register</a>
                @endguest
                @auth
                    @if(Auth::user()->type == 1)
                        <a href="{{ route('home') }}"><i class="fa-solid fa-right-to-bracket me-1"></i> Logout</a>
                    @else
                        <a href="{{ route('home') }}"><i class="fa-solid fa-user-circle me-1"></i> {{ Auth::user()->name }}</a>
                        <a href="{{ route('home') }}" class="p-1 rounded-circle shadow-sm d-flex justify-content-center align-items-center" style="width: 40px;height: 40px"><i class="fa-solid fa-cart-shopping" style="font-size: 15px"></i></a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>

