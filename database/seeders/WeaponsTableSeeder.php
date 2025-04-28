<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class WeaponsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('weapons')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $weapons = [
            'わかばシューター', 'もみじシューター', 'スプラシューター', 'スプラシューターコラボ',
            '52ガロン', '52ガロンデコ', '96ガロン', '96ガロンデコ',
            'シャープマーカー', 'シャープマーカーネオ',

            'プライムシューター', 'プライムシューターコラボ',

            'スペースシューター', 'スペースシューターコラボ',
            
            'ロングブラスター', 'ロングブラスターカスタム',
            'Rブラスターエリート', 'Rブラスターエリートデコ',

            'スプラローラー', 'スプラローラーコラボ',

            'スパッタリー', 'スパッタリー・ヒュー',
            'スプラマニューバー', 'スプラマニューバーコラボ',
            'デュアルスイーパー', 'デュアルスイーパーカスタム',

            'ドライブワイパー', 'ドライブワイパーデコ',

            'トライストリンガー', 'トライストリンガーコラボ',

            // スペシャル武器付き・ダブり名なしで合計143種
        ];

        foreach ($weapons as $name) {
            DB::table('weapons')->insert([
                'name' => $name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

