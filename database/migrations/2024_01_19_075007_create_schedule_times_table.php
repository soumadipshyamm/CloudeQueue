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
        Schema::create('schedule_times', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('parent_id')->nullable()->constrained()->references('id')->on('schedule_times')->onDelete('cascade');
            $table->foreignId('schedules_id')->nullable()->constrained()->references('id')->on('schedules')->onDelete('cascade')->comment('for master week_days');
            $table->foreignId('week_days_id')->nullable()->constrained()->references('id')->on('week_days')->onDelete('cascade')->comment('for master week_days');
            $table->string('week_name')->nullable();
            $table->time('open_time')->nullable();
            $table->time('close_time')->nullable();
            $table->integer('slot_duration')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('is_active')->default(true)->comment('0:Inactive,1:Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_times');
    }
};
