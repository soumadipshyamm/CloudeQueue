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
        Schema::create('profile_clinics', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('clinic_name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('alt_phone')->nullable();
            $table->string('address')->nullable();
            $table->enum('type', ['clinic'])->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->string('profile_images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_clinics');
    }
};
