<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->insert([
            ['name' => 'ガチエリア', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ガチヤグラ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ガチホコ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ガチアサリ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
