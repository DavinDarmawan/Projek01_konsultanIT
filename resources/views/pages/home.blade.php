@extends('layouts.app')

@section('title', 'Icommits IT Consultant Indonesia - Solusi TI Terbaik')

@section('content')
    @include('home.hero')
    @include('home.about')               <!-- hardcoded, bisa dinamis nanti -->
    @include('home.services')
    @include('home.benefits')            <!-- BARU: dinamis $benefits -->
    @include('home.technologies')        <!-- BARU: dinamis $technologies -->
    @include('home.workflow')            <!-- hardcoded -->
    @include('home.portfolio')
    @include('home.cta')                 <!-- BARU: dinamis $cta -->
@endsection