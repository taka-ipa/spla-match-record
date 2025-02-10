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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();  // リセットをリクエストしたユーザーのメールアドレス
            $table->string('token');             // 一時的なリセットトークン
            $table->timestamp('created_at')->nullable(); // いつリセットをリクエストしたか
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();       // セッションの一意なID
            $table->foreignId('user_id')->nullable()->index(); // ログインユーザーのID（未ログインならNULL）
            $table->string('ip_address', 45)->nullable(); // ユーザーのIPアドレス
            $table->text('user_agent')->nullable(); // 使用ブラウザなどの情報
            $table->longText('payload');            // セッションデータ
            $table->integer('last_activity')->index(); // 最終アクセス時間
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
