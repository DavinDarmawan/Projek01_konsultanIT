@extends('layouts.app')

@section('title', 'Tentang Icommits - IT Consultant Indonesia')
@section('about','active')
@section('content')
    @include('about.hero')
    @include('about.vision-mission')
    @include('about.values')
    @include('about.team')
    @include('about.partners')
@endsection