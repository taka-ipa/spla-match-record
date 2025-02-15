<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WeaponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weapons')->insert([
            ['name' => 'スシ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ロング', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'リッター', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ローラー', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'キャンプ', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}

