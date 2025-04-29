<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StagesTableSeeder extends Seeder
{
    public function run(): void
    {

        // データをinsert
        $stages = [
            ['name' => 'ユノハナ大渓谷', 'image_path' => '/images/stages/yunohana.jpg'],
            ['name' => 'ゴンズイ地区', 'image_path' => '/images/stages/gonzui.jpg'],
            ['name' => 'ヤガラ市場', 'image_path' => '/images/stages/yagara.jpg'],
            ['name' => 'マテガイ放水路', 'image_path' => '/images/stages/mategai.jpg'],
            ['name' => 'ナメロウ金属', 'image_path' => '/images/stages/namerou.jpg'],
            ['name' => 'マサバ海峡大橋', 'image_path' => '/images/stages/masaba.jpg'],
            ['name' => 'キンメダイ美術館', 'image_path' => '/images/stages/kinmedai.jpg'],
            ['name' => 'マヒマヒリゾート＆スパ', 'image_path' => '/images/stages/mahimahi.jpg'],
            ['name' => '海女美術大学', 'image_path' => '/images/stages/amabi.jpg'],
            ['name' => 'チョウザメ造船', 'image_path' => '/images/stages/chozame.jpg'],
            ['name' => 'ザトウマーケット', 'image_path' => '/images/stages/zatou.jpg'],
            ['name' => 'スメーシーワールド', 'image_path' => '/images/stages/smacy.jpg'],
            ['name' => 'クサヤ温泉', 'image_path' => '/images/stages/kusaya.jpg'],
            ['name' => 'ヒラメが丘団地', 'image_path' => '/images/stages/hirame.jpg'],
            ['name' => 'ナンプラー遺跡', 'image_path' => '/images/stages/nampla.jpg'],
            ['name' => 'マンタマリア号', 'image_path' => '/images/stages/manta.jpg'],
            ['name' => 'タラポートショッピングパーク', 'image_path' => '/images/stages/taraport.jpg'],
            ['name' => 'コンブトラック', 'image_path' => '/images/stages/konbu.jpg'],
            ['name' => 'タカアシ経済特区', 'image_path' => '/images/stages/takaashi.jpg'],
            ['name' => 'オヒョウ海運', 'image_path' => '/images/stages/ohyo.jpg'],
            ['name' => 'バイガイ亭', 'image_path' => '/images/stages/baigai.jpg'],
            ['name' => 'ネギトロ炭鉱', 'image_path' => '/images/stages/negitoro.jpg'],
            ['name' => 'カジキ空港', 'image_path' => '/images/stages/kajiki.jpg'],
            ['name' => 'リュウグウターミナル', 'image_path' => '/images/stages/ryugu.jpg'],
        ];

        foreach ($stages as $stage) {
            DB::table('stages')->insert([
                'name' => $stage['name'],
                'image_path' => $stage['image_path'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
