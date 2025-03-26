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
        Schema::create('match_results', function (Blueprint $table) {
            $table->id(); // プライマリキー
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID (外部キー)
            $table->foreignId('stage_id')->constrained()->onDelete('cascade'); // ステージID (外部キー)
            $table->foreignId('rule_id')->constrained()->onDelete('cascade'); // ルールID (外部キー)
            $table->foreignId('weapon_id')->constrained()->onDelete('cascade'); // 武器ID (外部キー)
            $table->string('result'); // 勝敗結果（例: 'win' or 'lose'）
            $table->string('replay_code', 20)->nullable()->comment('バトルメモリー'); // バトルメモリー（NULLを許可）
            $table->text('comment')->nullable(); // コメント（NULLを許可）
            $table->timestamps(); // created_at, updated_at を自動追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('match_results');
    }
};
