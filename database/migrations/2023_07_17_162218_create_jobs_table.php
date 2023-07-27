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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->text('requirements');
            $table->integer('opened_positions');
            $table->integer('years_of_experience');
            $table->decimal('salary', 8, 2);
            $table->foreignId('job_type_id')->constrained();
            $table->foreignId('job_category_id')->constrained();
            $table->foreignId('career_level_id')->constrained();
            $table->foreignId('location_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
