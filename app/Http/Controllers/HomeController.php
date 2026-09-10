<?php

namespace App\Http\Controllers;

use App\Mail\NewContactLeadMail;
use App\Models\ComboPackage;
use App\Models\Blog;
use App\Models\ContactLead;
use App\Models\Faq;
use App\Models\PortfolioProject;
use App\Models\PricingPlan;
use App\Models\ProcessStep;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home', [
            'settings' => SiteSetting::pluck('value', 'key'),
            'services' => Service::where('is_active', true)->orderBy('sort_order')->get()->groupBy('category'),
            'plans' => PricingPlan::where('is_active', true)->orderBy('sort_order')->get()->groupBy('category'),
            'combos' => ComboPackage::where('is_active', true)->orderBy('sort_order')->get(),
            'projects' => PortfolioProject::where('is_active', true)->orderByDesc('is_featured')->orderBy('sort_order')->get(),
            'steps' => ProcessStep::where('is_active', true)->orderBy('step_number')->get(),
            'testimonials' => Testimonial::where('is_active', true)->latest()->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('sort_order')->get(),
            'blogs' => Blog::where('is_active', true)->latest('published_at')->limit(3)->get(),
        ]);
    }

    public function contact(Request $request): RedirectResponse
    {
        $lead = ContactLead::create($request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['required', 'string', 'max:3000'],
        ]));

        try {
            Mail::to(env('LEAD_NOTIFY_TO', 'team@clickvera.in'))->send(new NewContactLeadMail($lead));
        } catch (Throwable $exception) {
            Log::error('Contact lead email failed.', [
                'lead_id' => $lead->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return back()->with('success', 'Thanks. Your inquiry is in, and we will get back to you shortly.');
    }
}
