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
        Schema::create('nutrition_meal_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutrition_meal_id')->constrained()->cascadeOnDelete();
            $table->string('food');
            $table->text('description');
            $table->decimal('quantity', 8, 2)->nullable();
            $table->string('unit', 20)->nullable();
            $table->unsignedSmallInteger('protein_g')->nullable();
            $table->unsignedSmallInteger('carbs_g')->nullable();
            $table->unsignedSmallInteger('fat_g')->nullable();
            $table->unsignedSmallInteger('calories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_meal_items');
    }
};
