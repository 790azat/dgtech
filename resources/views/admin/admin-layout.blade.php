    @extends('layout')

    @section('content')
        <div class="col-12 d-flex align-items-start">
            <div class="col-12 d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;height: 100vh">
                <div class="d-flex align-items-center gap-3 justify-content-center">
                    <a href="{{ route('welcome') }}" class="d-flex gap-2 align-items-center">
                        <img src="{{ asset('images/logo.png') }}" style="width: auth;height: 30px" alt="">
                        <p class="fw-bold fs-2 align-self-end mt-2" style="font-size: 30px;font-family: Paladins"> tech</p>
                    </a>
                </div>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link col-12 @if(Route::currentRouteName() == 'admin') active @endif" aria-current="page">
                            <i class="fa-solid fa-home me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/items" class="nav-link col-12 @if(Route::getCurrentRoute()->page == 'items') active @endif" aria-current="page">
                            <i class="fa-solid fa-box me-1"></i> Items
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/categories" class="nav-link col-12 @if(Route::getCurrentRoute()->page == 'categories') active @endif" aria-current="page">
                            <i class="fa-solid fa-folder-tree me-1"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link col-12 @if(Route::getCurrentRoute()->page == 'users') active @endif" aria-current="page">
                            <i class="fa-solid fa-user me-1"></i> Users
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="d-flex justify-content-center align-items-center text-light menu">
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-to-bracket me-1"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="col">
                <div class="col-12 align-items-center bg-dark py-3 d-flex px-4" style="min-height: 80px">
                    <div>
                        <div class="d-flex align-items-center text-white text-decoration-none">
                            <strong><i class="fa-solid fa-user me-1"></i> {{ Auth::user()->name }}</strong>
                        </div>
                    </div>
                    <div class="ms-auto d-flex gap-3 align-items-center text-light menu">
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-to-bracket me-1"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="col-12 p-3">
                    {{ $slot }}
                </div>
            </div>
        </div>
    @endsection
