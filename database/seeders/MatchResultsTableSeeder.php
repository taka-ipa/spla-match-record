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
            ]
        ]);
    }
}

