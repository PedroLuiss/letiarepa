<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('frozen_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_available')->default(true);
            $table->boolean('has_combo')->default(false);
            $table->string('combo_slug')->nullable();
            $table->string('combo_name')->nullable();
            $table->decimal('combo_price', 8, 2)->nullable();
            $table->string('combo_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('frozen_categories');
    }
};
