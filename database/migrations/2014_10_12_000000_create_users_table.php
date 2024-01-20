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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->foreignId('parent_id')->nullable()->constrained()->references('id')->on('users')->comment('for master users');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('mobile_number')->nullable();
            $table->mediumInteger('verification_code')->nullable()->comment('OTP used for verifying the phone number');
            $table->timestamp('mobile_number_verified_at')->nullable();
            $table->bigInteger('alternative_mobile_no')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('type')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->string('profile_images')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
