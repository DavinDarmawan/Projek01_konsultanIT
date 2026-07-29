@extends('layouts.app')

@section('title', 'Icommits IT Consultant Indonesia | Solusi Transformasi Digital Premium')

@section('content')
    @include('home.hero')
    @include('home.about')
    @include('home.services')
    @include('home.why-us')
    @include('home.portfolio')
    @include('home.cta')
    {{-- Contact preview bisa ditambahkan di sini jika perlu --}}
@endsection