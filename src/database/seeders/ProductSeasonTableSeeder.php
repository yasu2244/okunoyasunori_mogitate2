<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeasonTableSeeder extends Seeder
{
    public function run()
    {
        // 季節のIDを取得
        $spring_id = DB::table('seasons')->where('name', '春')->value('id');
        $summer_id = DB::table('seasons')->where('name', '夏')->value('id');
        $autumn_id = DB::table('seasons')->where('name', '秋')->value('id');
        $winter_id = DB::table('seasons')->where('name', '冬')->value('id');

        // 商品と季節の関連データを準備
        $productSeasons = [
            ['product_id' => DB::table('products')->where('name', 'キウイ')->value('id'), 'season_id' => $autumn_id],
            ['product_id' => DB::table('products')->where('name', 'キウイ')->value('id'), 'season_id' => $winter_id],
            ['product_id' => DB::table('products')->where('name', 'ストロベリー')->value('id'), 'season_id' => $spring_id],
            ['product_id' => DB::table('products')->where('name', 'オレンジ')->value('id'), 'season_id' => $winter_id],
            ['product_id' => DB::table('products')->where('name', 'スイカ')->value('id'), 'season_id' => $summer_id],
            ['product_id' => DB::table('products')->where('name', 'ピーチ')->value('id'), 'season_id' => $summer_id],
            ['product_id' => DB::table('products')->where('name', 'シャインマスカット')->value('id'), 'season_id' => $summer_id],
            ['product_id' => DB::table('products')->where('name', 'シャインマスカット')->value('id'), 'season_id' => $autumn_id],
            ['product_id' => DB::table('products')->where('name', 'パイナップル')->value('id'), 'season_id' => $spring_id],
            ['product_id' => DB::table('products')->where('name', 'パイナップル')->value('id'), 'season_id' => $summer_id],
            ['product_id' => DB::table('products')->where('name', 'ブドウ')->value('id'), 'season_id' => $summer_id],
            ['product_id' => DB::table('products')->where('name', 'ブドウ')->value('id'), 'season_id' => $autumn_id],
            ['product_id' => DB::table('products')->where('name', 'バナナ')->value('id'), 'season_id' => $summer_id],
            ['product_id' => DB::table('products')->where('name', 'メロン')->value('id'), 'season_id' => $spring_id],
            ['product_id' => DB::table('products')->where('name', 'メロン')->value('id'), 'season_id' => $summer_id],
        ];

        DB::table('product_season')->insert($productSeasons);
    }
}
