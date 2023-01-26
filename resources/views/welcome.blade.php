@extends('layout')

@section('content')
    @include('components.header')
    @include('components.hero')
{{--    @include('components.banner')--}}
{{--    @include('components.items')--}}
    @livewire('items',['name' => 'phone'])
    @slot('content')
@endsection

