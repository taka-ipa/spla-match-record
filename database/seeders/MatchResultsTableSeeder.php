<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
