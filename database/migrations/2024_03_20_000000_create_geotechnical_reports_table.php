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
        Schema::create('geotechnical_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('engineer_id')->constrained('engineers')->onDelete('cascade');
            $table->string('title');
            $table->string('project_name');
            $table->string('location');
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'submitted', 'approved', 'rejected'])->default('draft');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->json('soil_data')->nullable();
            $table->json('recommendations')->nullable();
            $table->text('conclusion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geotechnical_reports');
    }
}; 