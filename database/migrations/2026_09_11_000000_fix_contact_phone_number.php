<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Force the single verified site-wide phone number.
     * Production showed the old placeholder (+91 98765 43210) because the
     * contact_phone setting was never updated in the live database.
     */
    public function up(): void
    {
        DB::table('site_settings')->updateOrInsert(
            ['key' => 'contact_phone'],
            ['value' => '+91 8178842239', 'updated_at' => now(), 'created_at' => now()]
        );
    }

    public function down(): void
    {
        // Intentionally left blank: never restore the placeholder number.
    }
};
