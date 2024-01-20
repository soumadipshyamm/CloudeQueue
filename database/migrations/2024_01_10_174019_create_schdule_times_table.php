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
        Schema::create('schdule_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedules_id')->nullable()->constrained()->references('id')->on('schedules');
            $table->foreignId('schdule_times_id')->nullable()->constrained()->references('id')->on('schdule_times');
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->string('week_name')->nullable();
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schdule_times');
    }
};
