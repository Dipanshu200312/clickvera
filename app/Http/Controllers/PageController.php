<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ComboPackage;
use App\Models\Faq;
use App\Models\PortfolioProject;
use App\Models\PricingPlan;
use App\Models\ProcessStep;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\View\View;

class PageController extends Controller
{
    private function settings()
    {
        return SiteSetting::pluck('value', 'key');
    }

    public function about(): View
    {
        return view('pages.about', [
            'settings' => $this->settings(),
            'testimonials' => Testimonial::where('is_active', true)->latest()->get(),
        ]);
    }

    public function services(): View
    {
        return view('pages.services', [
            'settings' => $this->settings(),
            'services' => Service::where('is_active', true)->orderBy('sort_order')->get()->groupBy('category'),
            'plans' => PricingPlan::where('is_active', true)->orderBy('sort_order')->get()->groupBy('category'),
            'combos' => ComboPackage::where('is_active', true)->orderBy('sort_order')->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    public function work(): View
    {
        return view('pages.work', [
            'settings' => $this->settings(),
            'projects' => PortfolioProject::where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->get(),
        ]);
    }

    public function process(): View
    {
        return view('pages.process', [
            'settings' => $this->settings(),
            'steps' => ProcessStep::where('is_active', true)->orderBy('step_number')->get(),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'settings' => $this->settings(),
            'faqs' => Faq::where('is_active', true)->orderBy('sort_order')->limit(5)->get(),
        ]);
    }

    public function privacy(): View
    {
        return view('pages.privacy', ['settings' => $this->settings()]);
    }

    public function terms(): View
    {
        return view('pages.terms', ['settings' => $this->settings()]);
    }
}
