<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\MatchResult;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ja_JP'); // 日本語の Faker を使用

        // 投稿ユーザーとリザルトの数を指定 (必要に応じて調整)
        $users = User::all();
        $matchResults = MatchResult::all();
        $numberOfComments = 10; // 生成するコメントの数

        if ($users->isNotEmpty() && $matchResults->isNotEmpty()) {
            for ($i = 0; $i < $numberOfComments; $i++) {
                $user = $users->random();
                $matchResult = $matchResults->random();
                $parentId = null;

                // 親コメントが存在する場合は、確率で返信コメントにする
                if (Comment::count() > 0 && $faker->boolean(30)) { // 30% の確率で返信する
                    $parentId = Comment::inRandomOrder()->first()->id;
                }

                Comment::create([
                    'user_id' => $user->id,
                    'match_result_id' => $matchResult->id,
                    'parent_id' => $parentId,
                    'body' => $faker->realTextBetween(5, 20), // 5〜20文字のランダムなテキスト
                    'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
                ]);
            }
        }
    }
}