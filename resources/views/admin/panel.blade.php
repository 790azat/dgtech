@extends('layout')

@section('content')
@include('components.header')
    <div class="col-12 mt-5">
        <div class="container">
            <div class="shadow-sm rounded-1 p-4">
                <div class="col-12">
                    <a href="">
                        <button class="btn btn-success"><i class="fa-solid fa-plus me-1"></i> Add item</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-5">
        <div class="container">
            <div class="shadow-sm rounded-1 p-4">
                @if($items !== null)
                    @foreach($items as $item)
                        <div class="col-12 shadow-sm rounded-1 d-flex">
                            <p class="text-truncate col-2">{{ $item->name }}</p>
                            <p class="text-truncate col-2">{{ $item->price }}</p>
                            <p class="text-truncate col-2">{{ $item->info }}</p>
                            <p class="text-truncate col-2">{{ $item->image }}</p>
                            <p class="text-truncate col-2">{{ $item->images }}</p>
                            <p class="text-truncate col-2">{{ $item->category->name }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
