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
        Schema::create('clinic_user_permission', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('clinic_permission_id');
            $table->unsignedBigInteger('permission_id');

            //FOREIGN KEY
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('clinic_permission_id')->references('id')->on('clinic_permission')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            //PRIMARY KEYS
            // $table->primary(['user_id', 'clinic_permission_id']);
            $table->primary(['user_id', 'permission_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_user_permission');
    }
};
