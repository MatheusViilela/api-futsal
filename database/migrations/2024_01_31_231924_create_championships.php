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
        Schema::create('championships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teams_id');
            $table->integer('score')->default(0);
            $table->integer('number_of_goals')->default(0);
            $table->integer('number_of_victories')->default(0);
            $table->integer('number_of_defeats')->default(0);
            $table->timestamps();

            $table->foreign('teams_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('championships');
    }
};
