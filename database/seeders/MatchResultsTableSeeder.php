<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str; // ランダムなリプレイコード生成用

class MatchResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('match_results')->insert([
            [
                'user_id' => 1,
                'stage_id' => 1,
                'rule_id' => 1,
                'weapon_id' => 1,
                'result' => 'win',
                'comment' => 'Good teamwork led to victory!',
                'replay_code' => Str::upper(Str::random(12)), // ランダムな12文字のリプレイコード
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'stage_id' => 2,
                'rule_id' => 2,
                'weapon_id' => 2,
                'result' => 'lose',
                'comment' => 'Tough match, need better positioning.',
                'replay_code' => Str::upper(Str::random(12)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 3,
                'stage_id' => 3,
                'rule_id' => 3,
                'weapon_id' => 3,
                'result' => 'win',
                'comment' => 'Close game, but secured the win!',
                'replay_code' => Str::upper(Str::random(12)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'stage_id' => 4,
                'rule_id' => 4,
                'weapon_id' => 4,
                'result' => 'lose',
                'comment' => 'Got outplayed, need to improve my aim.',
                'replay_code' => Str::upper(Str::random(12)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 2,
                'stage_id' => 5,
                'rule_id' => 1,
                'weapon_id' => 5,
                'result' => 'win',
                'comment' => 'Great strategy execution!',
                'replay_code' => Str::upper(Str::random(12)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}

