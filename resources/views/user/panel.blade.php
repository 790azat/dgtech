@extends('layout')

@section('content')
    {{ \Illuminate\Support\Facades\Auth::user()->name }}
@endsection
