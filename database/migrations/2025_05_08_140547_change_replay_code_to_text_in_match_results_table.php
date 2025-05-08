<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('match_results', function (Blueprint $table) {
            // 変更するには doctrine/dbal が必要！
            $table->text('replay_code')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('match_results', function (Blueprint $table) {
            $table->string('replay_code', 600)->nullable()->change(); // 元に戻す用
        });
    }
};

