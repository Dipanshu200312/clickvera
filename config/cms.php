<?php

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ComboPackage;
use App\Models\ContactLead;
use App\Models\Faq;
use App\Models\PortfolioProject;
use App\Models\PricingPlan;
use App\Models\ProcessStep;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\User;

return [
    'resources' => [
        'users' => [
            'label' => 'User',
            'model' => User::class,
            'columns' => ['name', 'email', 'created_at'],
            'fields' => [
                'name' => ['label' => 'Name', 'rules' => ['required', 'string', 'max:255']],
                'email' => ['label' => 'Email', 'rules' => ['required', 'email', 'max:255', 'unique:users,email']],
                'password' => ['label' => 'Password', 'type' => 'password', 'rules' => ['required', 'string', 'min:8']],
            ],
        ],
        'blog-categories' => [
            'label' => 'Blog Category',
            'model' => BlogCategory::class,
            'columns' => ['name', 'slug', 'sort_order', 'is_active'],
            'fields' => [
                'name' => ['label' => 'Category name', 'rules' => ['required', 'string', 'max:120']],
                'slug' => ['label' => 'Slug', 'slug_from' => 'name', 'rules' => ['nullable', 'string', 'max:140']],
                'description' => ['label' => 'Description', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:500']],
                'sort_order' => ['label' => 'Sort order', 'type' => 'number', 'rules' => ['nullable', 'integer']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'blogs' => [
            'label' => 'Blog Post',
            'model' => Blog::class,
            'columns' => ['title', 'category_name', 'slug', 'published_at', 'is_active'],
            'storage' => 'blogs',
            'fields' => [
                'title' => ['label' => 'Title', 'rules' => ['required', 'string', 'max:180']],
                'slug' => ['label' => 'Slug', 'slug_from' => 'title', 'rules' => ['nullable', 'string', 'max:200']],
                'blog_category_id' => ['label' => 'Category', 'type' => 'select', 'options_model' => BlogCategory::class, 'rules' => ['required', 'integer', 'exists:blog_categories,id']],
                'description' => ['label' => 'Short description', 'type' => 'textarea', 'rules' => ['required', 'string', 'max:500']],
                'content' => ['label' => 'Full content', 'type' => 'richtext', 'rules' => ['required', 'string']],
                'featured_image' => ['label' => 'Featured image', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:2048']],
                'meta_title' => ['label' => 'Meta title', 'rules' => ['nullable', 'string', 'max:180']],
                'meta_description' => ['label' => 'Meta description', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:300']],
                'meta_keywords' => ['label' => 'Meta keywords', 'rules' => ['nullable', 'string', 'max:255']],
                'published_at' => ['label' => 'Published at', 'type' => 'datetime-local', 'rules' => ['nullable', 'date']],
                'is_active' => ['label' => 'Published', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'services' => [
            'label' => 'Service',
            'model' => Service::class,
            'columns' => ['title', 'category', 'is_active'],
            'fields' => [
                'category' => ['label' => 'Category', 'rules' => ['required', 'string', 'max:120']],
                'title' => ['label' => 'Title', 'rules' => ['required', 'string', 'max:160']],
                'description' => ['label' => 'Description', 'type' => 'textarea', 'rules' => ['required', 'string']],
                'icon' => ['label' => 'Icon', 'rules' => ['nullable', 'string', 'max:80']],
                'sort_order' => ['label' => 'Sort order', 'type' => 'number', 'rules' => ['nullable', 'integer']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'pricing-plans' => [
            'label' => 'Pricing Plan',
            'model' => PricingPlan::class,
            'columns' => ['name', 'category', 'price', 'is_highlighted'],
            'fields' => [
                'category' => ['label' => 'Category', 'rules' => ['required', 'string', 'max:120']],
                'name' => ['label' => 'Plan name', 'rules' => ['required', 'string', 'max:120']],
                'price' => ['label' => 'Price', 'rules' => ['required', 'string', 'max:120']],
                'description' => ['label' => 'Description', 'type' => 'textarea', 'rules' => ['nullable', 'string']],
                'features' => ['label' => 'Features, one per line', 'type' => 'lines', 'rules' => ['nullable']],
                'sort_order' => ['label' => 'Sort order', 'type' => 'number', 'rules' => ['nullable', 'integer']],
                'is_highlighted' => ['label' => 'Highlight this plan', 'type' => 'checkbox', 'rules' => ['nullable']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'combo-packages' => [
            'label' => 'Combo Package',
            'model' => ComboPackage::class,
            'columns' => ['name', 'price', 'is_active'],
            'fields' => [
                'name' => ['label' => 'Name', 'rules' => ['required', 'string', 'max:120']],
                'price' => ['label' => 'Price', 'rules' => ['required', 'string', 'max:120']],
                'description' => ['label' => 'Description', 'type' => 'textarea', 'rules' => ['required', 'string']],
                'features' => ['label' => 'Features, one per line', 'type' => 'lines', 'rules' => ['nullable']],
                'sort_order' => ['label' => 'Sort order', 'type' => 'number', 'rules' => ['nullable', 'integer']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'portfolio-projects' => [
            'label' => 'Portfolio Project',
            'model' => PortfolioProject::class,
            'columns' => ['title', 'category', 'live_link', 'is_featured'],
            'fields' => [
                'title' => ['label' => 'Title', 'rules' => ['required', 'string', 'max:160']],
                'category' => ['label' => 'Category', 'rules' => ['required', 'string', 'max:120']],
                'description' => ['label' => 'Description', 'type' => 'textarea', 'rules' => ['required', 'string']],
                'image_path' => ['label' => 'Project image', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:2048']],
                'live_link' => ['label' => 'Live link', 'rules' => ['nullable', 'url', 'max:255']],
                'sort_order' => ['label' => 'Sort order', 'type' => 'number', 'rules' => ['nullable', 'integer']],
                'is_featured' => ['label' => 'Featured', 'type' => 'checkbox', 'rules' => ['nullable']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'process-steps' => [
            'label' => 'Process Step',
            'model' => ProcessStep::class,
            'columns' => ['step_number', 'title', 'is_active'],
            'fields' => [
                'step_number' => ['label' => 'Step number', 'type' => 'number', 'rules' => ['required', 'integer']],
                'title' => ['label' => 'Title', 'rules' => ['required', 'string', 'max:160']],
                'description' => ['label' => 'Description', 'type' => 'textarea', 'rules' => ['required', 'string']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'testimonials' => [
            'label' => 'Testimonial',
            'model' => Testimonial::class,
            'columns' => ['name', 'role', 'rating', 'is_active'],
            'fields' => [
                'name' => ['label' => 'Client name', 'rules' => ['required', 'string', 'max:120']],
                'role' => ['label' => 'Role/company', 'rules' => ['nullable', 'string', 'max:160']],
                'image_path' => ['label' => 'Client image', 'type' => 'image', 'rules' => ['nullable', 'image', 'max:2048']],
                'rating' => ['label' => 'Rating', 'type' => 'number', 'rules' => ['required', 'integer', 'min:1', 'max:5']],
                'feedback' => ['label' => 'Feedback', 'type' => 'textarea', 'rules' => ['required', 'string']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'faqs' => [
            'label' => 'FAQ',
            'model' => Faq::class,
            'columns' => ['question', 'is_active'],
            'fields' => [
                'question' => ['label' => 'Question', 'rules' => ['required', 'string', 'max:255']],
                'answer' => ['label' => 'Answer', 'type' => 'textarea', 'rules' => ['required', 'string']],
                'sort_order' => ['label' => 'Sort order', 'type' => 'number', 'rules' => ['nullable', 'integer']],
                'is_active' => ['label' => 'Active', 'type' => 'checkbox', 'rules' => ['nullable']],
            ],
        ],
        'contact-leads' => [
            'label' => 'Contact Lead',
            'model' => ContactLead::class,
            'columns' => ['name', 'email', 'phone', 'status'],
            'fields' => [
                'name' => ['label' => 'Name', 'rules' => ['required', 'string', 'max:120']],
                'email' => ['label' => 'Email', 'rules' => ['required', 'email', 'max:160']],
                'phone' => ['label' => 'Phone', 'rules' => ['nullable', 'string', 'max:40']],
                'message' => ['label' => 'Message', 'type' => 'textarea', 'rules' => ['required', 'string']],
                'status' => ['label' => 'Status', 'rules' => ['required', 'string', 'max:40']],
            ],
        ],
    ],
];
