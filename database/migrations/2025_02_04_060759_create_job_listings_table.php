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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company_name');
            $table->string('company_logo');
            $table->string('location')->nullable(); // Example: Remote, On-site
            $table->string('experience'); // Example: "3-4 Yrs"
            $table->string('salary_range'); // Example: "2.5-4 Lacs PA"
            $table->json('tags')->nullable(); // Example: ["Remote", "Full-Time"]
            $table->text('description');
            $table->json('technologies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};