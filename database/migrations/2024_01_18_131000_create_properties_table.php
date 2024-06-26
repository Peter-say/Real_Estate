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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid', 12)->unique();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('address_id')->constrained('property_addresses')->nullable()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique(); // Ensure slugs are unique
            $table->json('images')->nullable(); // JSON array of room images
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->string('property_video')->nullable();
            $table->string('size');
            $table->string('type');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->string('year_built');
            $table->integer('garage');
            $table->integer('garage_size');
            $table->integer('square_ft');
            $table->string('floor_plan_description')->nullable();
            $table->json('floor_plan_images');
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('stock_status');
            $table->string('status')->default('active');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
