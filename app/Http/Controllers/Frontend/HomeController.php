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
use App\Services\TeamService;
use App\Services\PartnerService;

class HomeController extends Controller
{
        protected $teamService;
    protected $partnerService;

    public function __construct(TeamService $teamService, PartnerService $partnerService)
    {
        $this->teamService = $teamService;
        $this->partnerService = $partnerService;
    }
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
       $team = $this->teamService->getPublic();
        $partners = $this->partnerService->getPublic();
        
        return view('pages.about', compact('team', 'partners'));
    }

    public function contact()
    {
        $contact = CompanyInfo::first();

        return view('pages.contact', compact('contact'));
    }
}
