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
        Schema::create('schedule_break_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_times_id')->nullable()->constrained()->references('id')->on('schedule_times')->onDelete('cascade');
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_break_times');
    }
};
