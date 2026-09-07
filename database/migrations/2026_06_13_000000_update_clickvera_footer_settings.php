<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        foreach ([
            'site_name' => 'ClickVera',
            'footer_text' => 'ClickVera - Built for measurable digital growth.',
            'contact_email' => 'team@clickvera.in',
            'contact_phone' => '+91 8178842239',
        ] as $key => $value) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }

    public function down(): void
    {
        foreach ([
            'site_name' => 'GrowthForge Agency',
            'footer_text' => 'GrowthForge Agency - Built for measurable digital growth.',
            'contact_email' => 'hello@growthforge.test',
            'contact_phone' => '+91 98765 43210',
        ] as $key => $value) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }
};
