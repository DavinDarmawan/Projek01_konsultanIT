@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="row g-4">

    {{-- Services --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Total Services</h5>
            <h2 class="fw-bold">{{ $totalServices }}</h2>
        </div>
    </div>

    {{-- Portfolio --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Total Portfolio</h5>
            <h2 class="fw-bold">{{ $totalPortfolios }}</h2>
        </div>
    </div>

    {{-- Benefit --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Total Benefits</h5>
            <h2 class="fw-bold">{{ $totalBenefits }}</h2>
        </div>
    </div>

    {{-- Technology --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Total Technologies</h5>
            <h2 class="fw-bold">{{ $totalTechnologies }}</h2>
        </div>
    </div>

    {{-- Partner --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Total Partners</h5>
            <h2 class="fw-bold">{{ $totalPartners }}</h2>
        </div>
    </div>

    {{-- Service Article --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Service Articles</h5>
            <h2 class="fw-bold">{{ $totalArticles }}</h2>
        </div>
    </div>

    {{-- Contact --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Contact Messages</h5>
            <h2 class="fw-bold">{{ $totalContacts }}</h2>
        </div>
    </div>

    {{-- Company --}}
    <div class="col-md-3">
        <div class="neo-card text-center">
            <h5 class="text-muted">Company Profile</h5>

            @if($companyReady)
                <h2 class="fw-bold text-success">Ready ✓</h2>
            @else
                <h2 class="fw-bold text-danger">Empty</h2>
            @endif

        </div>
    </div>

</div>

<div class="mt-4">
    <div class="neo-card">
        <h4 class="fw-bold">
            Selamat Datang di Panel Admin Icommits
        </h4>

        <p class="text-muted mb-0">
            Kelola seluruh konten website Icommits melalui dashboard admin.
        </p>
    </div>
</div>

@endsection