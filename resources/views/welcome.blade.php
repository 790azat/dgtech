@extends('layout')

@section('content')
    @include('components.header')
    @include('components.hero')
{{--    @include('components.banner')--}}
    {{ $slot }}
@endsection



