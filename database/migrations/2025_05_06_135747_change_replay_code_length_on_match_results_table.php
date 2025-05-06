<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('match_results', function (Blueprint $table) {
            $table->string('replay_code', 600)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('match_results', function (Blueprint $table) {
            $table->string('replay_code', 20)->nullable()->change();
        });
    }
};
