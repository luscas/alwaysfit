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
        Schema::create('nutrition_meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutrition_plan_id')->constrained()->cascadeOnDelete();

            $table->enum('type', ['breakfast', 'breakfast_snack', 'lunch', 'afternoon_snack', 'dinner', 'supper'])->index();
            $table->unsignedTinyInteger('order')->default(0);

            $table->string('title');
            $table->unsignedInteger('calories')->nullable();

            $table->time('scheduled_time')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_meals');
    }
};
