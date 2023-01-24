@extends('layout')

@section('content')
    @include('components.header')
    <div class="col-12">
        <div class="container mt-2 mt-sm-4">
            <div class="col-12 d-flex flex-wrap shadow-sm rounded-1 overflow-hidden">
                <div class="col-12 col-sm-5 p-3">
                    <div class="col-12">
                        <div class="col-12 shadow-sm rounded-1">
                            <img src="{{ $item->image }}" style="width: 100%;height: auto;object-fit: cover" alt="">
                        </div>
                        <div class="col-12 d-flex gap-2 mt-2">
                            @foreach(json_decode($item->images) as $img)
                                <div class="col shadow rounded-1">
                                    <img src="{{ $img }}" style="width: 100%;height: auto;object-fit: cover" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-7 p-3">
                    <div class="col-12 d-flex justify-content-center text-center fw-bold fs-5 mb-3">
                        <div class="col-10 col-sm-6">
                            <p>{{ $item->name }}</p>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center gap-3 mb-3">
                        <div class="fw-bold fs-6 text-success text-nowrap d-flex gap-3">
                            <p>{{ $item->price }} դր. </p> <p> {{ $item->price / 400 }} $</p>
                        </div>
                        <div>
                            <button class="btn btn-success px-5">Buy</button>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-11 col-sm-8">
                            <p>{{ $item->info }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
