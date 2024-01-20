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
        Schema::create('clinic_user_role', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('clinic_role_id');
            $table->unsignedBigInteger('role_id');

            //FOREIGN KEY
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('clinic_role_id')->references('id')->on('clinic_role')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            //PRIMARY KEYS
            // $table->primary(['user_id', 'clinic_role_id']);
            $table->primary(['user_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_user_role');
    }
};
