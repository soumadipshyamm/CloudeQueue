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
        Schema::create('schdule_weeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('week_days_id')->nullable()->constrained()->references('id')->on('week_days')->comment('for master week_days');
            $table->string('week_name')->nullable();
            $table->foreignId('schedules_id')->nullable()->constrained()->references('id')->on('schedules')->comment('for master week_days');
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schdule_weeks');
    }
};
