<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Benefit;
use App\Models\Technology;

use App\Models\Partner;
use App\Models\Contact;
use App\Models\ServiceArticle;
use App\Models\CompanyInfo;

class DashboardController extends Controller
{
    public function index()
{
    return view('admin.dashboard', [

    'totalServices' => Service::count(),

    'totalPortfolios' => Portfolio::count(),

    'totalBenefits' => Benefit::count(),

    'totalTechnologies' => Technology::count(),

    'totalPartners' => Partner::count(),

    'totalArticles' => ServiceArticle::count(),

    'totalContacts' => Contact::count(),

    'companyReady' => CompanyInfo::exists(),

]);
}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}