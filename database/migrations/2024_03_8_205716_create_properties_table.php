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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->string('price');
            $table->string('floor');
            $table->string('hall');
            $table->string('space');
            $table->string('room');
            $table->string('Baths');
            $table->string('Kitchen');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->text('address');
            $table->enum('type', ['villa', 'Apartment'])->default('Apartment')->nullable();
            $table->enum('status', ['sell', 'rent'])->default('sell')->nullable();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
