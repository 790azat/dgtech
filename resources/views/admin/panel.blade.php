@extends('layout')

@section('content')
    @include('components.header')
    <div class="col-12 mt-3">
        <div class="container">
            <div class="shadow-sm rounded-1 p-4">
                <div class="col-12">
                    <div class="col-12 d-flex gap-3">
                        <a href="{{ route('admin-items') }}"><button class="btn btn-outline-success @if(Route::current()->uri == 'admin-items') active @endif"><i class="fa-solid fa-box me-1"></i> Items</button></a>
                        <a href="{{ route('admin-categories') }}"><button class="btn btn-outline-primary @if(Route::current()->uri == 'admin-categories') active @endif"><i class="fa-solid fa-sitemap me-1"></i> Categories</button></a>
                        <a href="{{ route('admin-users') }}"><button class="btn btn-outline-warning @if(Route::current()->uri == 'admin-users') active @endif"><i class="fa-solid fa-user me-1"></i> Users</button></a>
                    </div>
                </div>
            </div>
            <div class="shadow-sm rounded-1 p-4 mt-2">
                @yield('admin-info')
            </div>
        </div>
    </div>
@endsection
