<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stages')->insert([
            ['name' => 'ザトウ', 'image_path' => '/images/stage1.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ネギトロ', 'image_path' => '/images/stage2.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'マサバ', 'image_path' => '/images/stage3.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ナメロウ', 'image_path' => '/images/stage4.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ヒラメ', 'image_path' => '/images/stage5.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'タラポート', 'image_path' => '/images/stage6.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'タタラ', 'image_path' => '/images/stage7.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'サーモン', 'image_path' => '/images/stage8.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ジェシカ', 'image_path' => '/images/stage9.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'ロマン', 'image_path' => '/images/stage10.jpg', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}