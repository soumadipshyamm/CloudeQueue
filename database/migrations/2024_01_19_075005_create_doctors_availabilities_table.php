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
        Schema::create('doctors_availabilities', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->foreignId('doctor_id')->unsigned()->references('id')->on('users')->nullable();
            $table->foreignId('clinics_id')->unsigned()->references('id')->on('profile_clinics')->nullable();
            $table->foreignId('schedule_id')->unsigned()->references('id')->on('schedules')->nullable();
            $table->string('available_day', 20)->nullable();
            $table->time('available_from')->nullable();
            $table->time('available_to')->nullable();
            $table->date('valid_date')->nullable();
            $table->integer('total_patient')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_availabilities');
    }
};
