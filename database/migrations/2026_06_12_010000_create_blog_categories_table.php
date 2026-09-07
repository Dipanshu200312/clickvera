<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreignId('blog_category_id')->nullable()->after('category')->constrained()->nullOnDelete();
        });

        $categories = collect([
            'Digital Marketing',
            'Education',
            'Health',
            'Guest Posting',
            'SEO',
            'Website Development',
            'Content Writing',
            'Business',
            'Technology',
            'Other',
        ])->merge(DB::table('blogs')->whereNotNull('category')->pluck('category'))->unique()->values();

        foreach ($categories as $index => $name) {
            DB::table('blog_categories')->updateOrInsert(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'description' => null,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        DB::table('blogs')->orderBy('id')->each(function ($blog) {
            $categoryId = DB::table('blog_categories')
                ->where('slug', Str::slug($blog->category ?: 'Digital Marketing'))
                ->value('id');

            DB::table('blogs')->where('id', $blog->id)->update([
                'blog_category_id' => $categoryId,
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropConstrainedForeignId('blog_category_id');
        });

        Schema::dropIfExists('blog_categories');
    }
};
