@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <div class="row g-4">
        <div class="col-md-3">
            <div class="neo-card text-center">
                <h5 class="text-muted">Total Services</h5>
                <h2 class="fw-bold">{{ $totalServices ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="neo-card text-center">
                <h5 class="text-muted">Total Portfolio</h5>
                <h2 class="fw-bold">{{ $totalPortfolios ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="neo-card text-center">
                <h5 class="text-muted">Total Benefits</h5>
                <h2 class="fw-bold">{{ $totalBenefits ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="neo-card text-center">
                <h5 class="text-muted">Total Technologies</h5>
                <h2 class="fw-bold">{{ $totalTechnologies ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="neo-card">
            <h4 class="fw-bold">Selamat Datang di Panel Admin Icommits</h4>
            <p class="text-muted">Kelola semua konten landing page dengan mudah di sini.</p>
        </div>
    </div>
@endsection