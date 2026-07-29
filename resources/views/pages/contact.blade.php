@extends('layouts.app')

@section('title', 'Kontak Icommits - Hubungi Kami')
@section('contact', 'active')
@section('content')
    @include('contact.hero')
    @include('contact.info')
    @include('contact.map')
@endsection