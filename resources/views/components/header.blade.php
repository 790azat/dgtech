<div class="col-12 bg-dark text-light" style="background: #eeeeee">
    <div class="container py-3 px-4 px-sm-2">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('welcome') }}" class="d-flex gap-2 align-items-center">
                <img src="{{ asset('images/logo.png') }}" style="width: 70px" alt="">
                <p class="fw-bold fs-2 align-self-end mt-2" style="font-size: 30px;font-family: Paladins"> tech</p>
            </a>
            <div class="text-light d-flex align-items-center gap-2 ms-4 mt-2 fs-5">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-telegram"></i></a>
            </div>
            <div class="d-flex align-items-center gap-3 ms-auto menu">
                @guest
                    <a href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket me-1"></i> <p class="d-none d-sm-inline">Login</p></a>
                    <a href="{{ route('register') }}"><i class="fa-solid fa-user-circle me-1"></i> <p class="d-none d-sm-inline">Register</p></a>
                @endguest
                @auth
                    @if(Auth::user()->type == 1)
                        <a href="{{ route('home') }}"><i class="fa-solid fa-user-circle me-1"></i> <p class="d-none d-sm-inline">{{ Auth::user()->name }}</p></a>
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-to-bracket me-1"></i> Logout</a>
                    @else
                        <div class="d-flex dropstart">
                            <a data-bs-toggle="dropdown" aria-expanded="false" class="p-1 rounded-circle shadow-sm d-flex justify-content-center align-items-center" style="width: 40px;height: 40px"><i class="fa-solid fa-cart-shopping" style="font-size: 15px"></i></a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                @if(session()->has('cart'))
                                    @foreach(session('cart') as $item)
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <img src="{{ \App\Models\Item::find($item)->image }}" style="width: 20px;height: auto;" alt="">
                                                {{ \App\Models\Item::find($item)->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="bg-danger rounded-circle p-1 d-flex justify-content-center align-items-center text-center" style="width: 20px;height: 20px;line-height: 10px;font-size: 10px">
                                @livewire('cart')
                            </div>
                        </div>
                        <a href="{{ route('home') }}"><i class="fa-solid fa-user-circle me-1"></i> <p class="d-none d-sm-inline">{{ Auth::user()->name }}</p></a>
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-to-bracket me-1"></i> <p class="d-none d-sm-inline">Logout</p></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>

