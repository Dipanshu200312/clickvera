<?php

namespace Database\Seeders;

use App\Models\ComboPackage;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Faq;
use App\Models\PortfolioProject;
use App\Models\PricingPlan;
use App\Models\ProcessStep;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@example.com'], ['name' => 'Agency Admin', 'password' => Hash::make('password')]);

        foreach ([
            'site_name' => 'ClickVera',
            'hero_heading' => 'Digital campaigns, websites, and content built to win better leads.',
            'hero_subheading' => 'Launch a premium web presence, publish authority-building content, and run performance marketing from one accountable growth partner.',
            'primary_cta' => 'Book a free strategy call',
            'secondary_cta' => 'Explore packages',
            'about_title' => 'A compact growth team for brands that want momentum.',
            'about_description' => 'We combine conversion-led design, technical development, search strategy, paid campaigns, and editorial content so every channel supports the same business goal.',
            'mission' => 'Help businesses turn digital attention into measurable revenue with clear strategy and consistent execution.',
            'vision' => 'To be the most trusted digital growth partner for ambitious service and commerce brands.',
            'footer_text' => 'ClickVera - Digital marketing, websites, and content writing for serious growth.',
            'contact_email' => 'team@clickvera.in',
            'contact_phone' => '+91 8178842239',
            'meta_description' => 'Digital marketing, website development, content writing, and dynamic Laravel CMS.',
        ] as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        $services = [
            ['Digital Marketing', 'SEO', 'Technical SEO, local search, content optimization, and reporting that compounds organic visibility.'],
            ['Digital Marketing', 'SMM', 'Social strategy, creative calendars, publishing, and community-first campaign execution.'],
            ['Digital Marketing', 'Ads', 'Google and Meta ad campaigns built around landing pages, tracking, and conversion quality.'],
            ['Digital Marketing', 'Content Marketing', 'Topic clusters, lead magnets, and editorial systems that build trust before the sales call.'],
            ['Website Development', 'Business Sites', 'Fast, modern company websites designed to present authority and generate inquiries.'],
            ['Website Development', 'E-commerce', 'Storefronts, product pages, checkout flows, and integrations for growing online sales.'],
            ['Website Development', 'Landing Pages', 'Campaign-specific pages with sharp copy, clean UX, and conversion tracking.'],
            ['Website Development', 'Custom Apps', 'Laravel-based portals, dashboards, booking systems, and workflow tools.'],
            ['Content Writing', 'Blogs', 'SEO-ready articles with research, structure, and a consistent brand voice.'],
            ['Content Writing', 'Website Content', 'Homepage, service page, and about page copy written to convert.'],
            ['Content Writing', 'Copywriting', 'High-intent sales copy for ads, landing pages, emails, and launch campaigns.'],
            ['Content Writing', 'Product Descriptions', 'Clear, persuasive product copy for catalogs and e-commerce pages.'],
        ];
        foreach ($services as $i => [$category, $title, $description]) {
            Service::updateOrCreate(['category' => $category, 'title' => $title], ['description' => $description, 'sort_order' => $i + 1, 'is_active' => true]);
        }

        $plans = [
            ['Website Development', 'Basic', '₹4,999 - ₹9,999', false], ['Website Development', 'Standard', '₹12,999 - ₹24,999', true], ['Website Development', 'Premium', '₹29,999 - ₹79,999+', false],
            ['Digital Marketing', 'Starter', '₹5,000 - ₹10,000/mo', false], ['Digital Marketing', 'Growth', '₹15,000 - ₹30,000/mo', true], ['Digital Marketing', 'Advanced', '₹35,000 - ₹80,000+/mo', false],
            ['Content Writing', 'Basic', '₹500 - ₹1,000/article', false], ['Content Writing', 'Standard', '₹1,500 - ₹3,000/article', true], ['Content Writing', 'Premium', '₹4,000 - ₹10,000+', false],
        ];
        foreach ($plans as $i => [$category, $name, $price, $highlight]) {
            PricingPlan::updateOrCreate(['category' => $category, 'name' => $name], [
                'price' => $price, 'description' => 'Ideal for brands ready to improve quality, consistency, and conversion.',
                'features' => ['Strategy call', 'Dedicated execution', 'Monthly reporting'], 'is_highlighted' => $highlight, 'is_active' => true, 'sort_order' => $i + 1,
            ]);
        }

        foreach ([['Starter Combo', '₹19,999'], ['Business Combo', '₹39,999'], ['Premium Package', '₹79,999+']] as $i => [$name, $price]) {
            ComboPackage::updateOrCreate(['name' => $name], ['price' => $price, 'description' => 'Website, marketing setup, and content assets bundled for faster launch.', 'features' => ['Website pages', 'SEO setup', 'Launch content'], 'sort_order' => $i + 1, 'is_active' => true]);
        }

        foreach ([['SaaS Landing Page', 'Website Development'], ['Local SEO Campaign', 'Digital Marketing'], ['E-commerce Content System', 'Content Writing']] as $i => [$title, $category]) {
            PortfolioProject::updateOrCreate(['title' => $title], ['category' => $category, 'description' => 'A focused project built around clarity, speed, and measurable lead generation.', 'sort_order' => $i + 1, 'is_featured' => $i === 0, 'is_active' => true]);
        }

        foreach ([['Discovery', 'We map goals, offers, audiences, and the fastest path to qualified leads.'], ['Build', 'Our team designs, writes, develops, and launches the growth assets.'], ['Optimize', 'We measure performance and improve conversion, content, and campaigns.'], ['Scale', 'Winning channels get more budget, better content, and stronger automation.']] as $i => [$title, $description]) {
            ProcessStep::updateOrCreate(['step_number' => $i + 1], ['title' => $title, 'description' => $description, 'is_active' => true]);
        }

        Testimonial::updateOrCreate(['name' => 'Priya Sharma'], ['role' => 'Founder, Studio Brand', 'rating' => 5, 'feedback' => 'The new website and launch content helped us look premium and start receiving better inquiries within weeks.', 'is_active' => true]);
        Testimonial::updateOrCreate(['name' => 'Arjun Mehta'], ['role' => 'Director, Retail Company', 'rating' => 5, 'feedback' => 'Their marketing plan was clear, practical, and tied to numbers from day one.', 'is_active' => true]);

        foreach ([['How soon can we launch?', 'A focused website can launch in 7-21 days depending on scope and content readiness.'], ['Can I manage content myself?', 'Yes. The admin panel lets you manage services, pricing, projects, testimonials, FAQs, leads, and homepage text.'], ['Do you offer monthly retainers?', 'Yes. Digital marketing and content plans can be handled as monthly retainers.']] as $i => [$question, $answer]) {
            Faq::updateOrCreate(['question' => $question], ['answer' => $answer, 'sort_order' => $i + 1, 'is_active' => true]);
        }

        foreach (['Digital Marketing', 'Education', 'Health', 'Guest Posting', 'SEO', 'Website Development', 'Content Writing', 'Business', 'Technology', 'Other'] as $i => $category) {
            BlogCategory::updateOrCreate(['slug' => (string) str($category)->slug()], [
                'name' => $category,
                'sort_order' => $i + 1,
                'is_active' => true,
            ]);
        }

        foreach ([
            ['How to Build a Website That Converts', 'website-that-converts', 'Website Development', 'A practical guide to planning pages, offers, and CTAs for better lead quality.'],
            ['SEO and Content: The Growth Pair', 'seo-content-growth-pair', 'SEO', 'Why search strategy and content writing work best when planned together.'],
            ['What to Include in a Marketing Retainer', 'marketing-retainer-guide', 'Digital Marketing', 'A simple breakdown of deliverables that make monthly marketing retainers useful.'],
            ['Guest Posting for Authority', 'guest-posting-authority', 'Guest Posting', 'How guest posts can support credibility, referral traffic, and search visibility.'],
        ] as [$title, $slug, $category, $description]) {
            $blogCategory = BlogCategory::where('slug', (string) str($category)->slug())->first();

            Blog::updateOrCreate(['slug' => $slug], [
                'title' => $title,
                'category' => $category,
                'blog_category_id' => $blogCategory?->id,
                'description' => $description,
                'content' => '<h2>Start with a clear business goal</h2><p>Then map your audience, offer, conversion path, and content plan. Strong digital growth usually comes from alignment: your website, ads, SEO, and copy should all support the same outcome.</p><blockquote>Review performance monthly and improve what is already working.</blockquote>',
                'meta_title' => $title.' | GrowthForge Agency',
                'meta_description' => $description,
                'meta_keywords' => 'digital marketing, website development, SEO, content writing',
                'published_at' => now(),
                'is_active' => true,
            ]);
        }
    }
}
