<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('frozen_products', function (Blueprint $table) {
            $table->string('category_slug')->nullable()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('frozen_products', function (Blueprint $table) {
            $table->dropColumn('category_slug');
        });
    }
};
