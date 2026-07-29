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
        return view('pages.about');
    }

    public function contact()
    {
        $contact = CompanyInfo::first();

        return view('pages.contact', compact('contact'));
    }
}
