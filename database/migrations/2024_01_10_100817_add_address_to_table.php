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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('country_id')->after('type')->nullable()->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('state_id')->after('country_id')->nullable()->references('id')->on('states')->onDelete('cascade');
            $table->foreignId('city_id')->after('state_id')->nullable()->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['country_id', 'state_id', 'city_id']);
        });
    }
};
