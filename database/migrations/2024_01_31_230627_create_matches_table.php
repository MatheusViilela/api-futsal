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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->time('start_match');
            $table->time('end_match');
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team1_score');
            $table->unsignedBigInteger('team2_id');
            $table->unsignedBigInteger('team2_score');
            $table->unsignedBigInteger('winner_team_id')->nullable();
            $table->timestamps();


            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
