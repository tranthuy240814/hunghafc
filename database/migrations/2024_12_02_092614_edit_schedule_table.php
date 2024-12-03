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
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('league_id');
            $table->dropColumn('set_1_team_1');
            $table->dropColumn('set_1_team_2');
            $table->dropColumn('set_2_team_1');
            $table->dropColumn('set_2_team_2');
            $table->dropColumn('set_3_team_1');
            $table->dropColumn('set_3_team_2');
            $table->dropColumn('round');
            $table->dropColumn('player1_team_1');
            $table->dropColumn('player2_team_1');
            $table->dropColumn('player1_team_2');
            $table->dropColumn('player2_team_2');
            $table->string('team1');
            $table->string('team2');
            $table->string('logo_team_1')->nullable();
            $table->string('logo_team_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->date('end_date_register')->change();
        });
    }

};
