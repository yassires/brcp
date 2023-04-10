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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('brand')->default(3);
            $table->integer('category')->default(1);
            $table->string('color');
            $table->decimal('price_sell');
            $table->decimal('price_rent');
            $table->string('image')->default("img\mercedes-classe-c.jpeg");
            $table->boolean('available')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
