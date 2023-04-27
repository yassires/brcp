<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // //
            // $table->unsignedBigInteger('user_id')->change();
            // $table->Integer('car_id')->change();
            // $table->foreignId('car_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('car_id')->references("id")->on("cars")->onDelete("cascade");
            // $table->foreignId('user_id')->references("id")->on("users")->onDelete("cascade");

            $table->unsignedBigInteger('car_id')->change();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
            $table->dropForeign(['car_id']);
        });
    }
};
