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
use App\Models\ServiceArticle;
use App\Models\Partner;

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
        $servicearticles = ServiceArticle::where('status', 'published')->get();
        $portfolios = Portfolio::all();
        $benefits = Benefit::all();
        $technologies = Technology::all();
        $cta = Cta::first();
        $partners = Partner::all(); // Ambil semua data partner

        return view('pages.home', compact(
            'hero', 'servicearticles', 'portfolios', 'benefits', 'technologies', 'cta','services', 'partners'
        ));
    }


    public function about()
    {
       $team = $this->teamService->getPublic();
        $partners = $this->partnerService->getPublic();
        $services = Service::where('status', 'active')->get();
        $servicearticles = ServiceArticle::where('status', 'published')->get();
        return view('pages.about', compact('team', 'partners', 'services', 'servicearticles'));
    }

    public function contact()
    {
        $contact = CompanyInfo::first();
        $services = Service::where('status', 'active')->get();
        
        $servicearticles = ServiceArticle::where('status', 'published')->get();
        return view('pages.contact', compact('contact', 'services', 'servicearticles'));
    }
public function servicearticle($slug)
    {
        $services = Service::where('status', 'active')->get();
        $article = ServiceArticle::where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$article) {
            $service = Service::where('slug', $slug)
                ->where('status', 'active')
                ->first();

            if ($service) {
                $article = $service->articles()
                    ->where('status', 'published')
                    ->latest()
                    ->first();
            }
        }

        if (!$article) {
            abort(404);
        }

        $service = $article->service;
    
        $servicearticles = ServiceArticle::where('status', 'published')->get();

        $relatedArticles = ServiceArticle::where('service_id', $service->id)
            ->where('id', '!=', $article->id)
            ->where('status', 'published')
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.service-article', compact('article', 'service', 'relatedArticles', 'services', 'servicearticles'));
    }
}
