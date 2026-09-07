<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactLead;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'Total inquiries' => ContactLead::count(),
                'Projects' => PortfolioProject::count(),
                'Testimonials' => Testimonial::count(),
                'Services' => Service::count(),
            ],
            'leads' => ContactLead::latest()->limit(6)->get(),
        ]);
    }
}
