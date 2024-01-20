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
        Schema::create('clinics_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('clinic_id');

            //FOREIGN KEY
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('clinic_id')->references('id')->on('profile_clinics')->onDelete('cascade');

            //PRIMARY KEYS
            $table->primary(['user_id', 'clinic_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics_users');
    }
};
