<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\CompanyInfo;
use App\Models\Cta;
use App\Models\HeroSection;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Technology;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        $services = Service::where('status', 'active')->get();
        $portfolios = Portfolio::all();
        $benefits = Benefit::all();
        $technologies = Technology::all();
        $cta = Cta::first();

        return view('pages.home', compact(
            'hero', 'services', 'portfolios', 'benefits', 'technologies', 'cta'
        ));
    }


    public function about()
    {
        // Ambil data teams dari API
        $teamsResponse = Http::get(url('api/teams'));
        $team = $teamsResponse->successful() ? $teamsResponse->json('data') : [];
        
        // Jika data berbentuk array, konversi ke object
        if (is_array($team) && !empty($team)) {
            $team = collect($team)->map(function($item) {
                return (object) $item;
            });
        }

        // Ambil data partners dari API
        $partnersResponse = Http::get(url('api/partners'));
        $partners = $partnersResponse->successful() ? $partnersResponse->json('data') : [];
        
        if (is_array($partners) && !empty($partners)) {
            $partners = collect($partners)->map(function($item) {
                return (object) $item;
            });
        }

        return view('pages.about', compact('team', 'partners'));
    }

    public function contact()
    {
        $contact = CompanyInfo::first();

        return view('pages.contact', compact('contact'));
    }
}
