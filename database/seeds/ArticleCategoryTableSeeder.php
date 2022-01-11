<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
          DB::table('article_categories')->insert([
            'slug' => Str::random(2).'_category'.$i,
            'name' => Str::random(10).'صنف'.$i,
            'short_description' =>  Str::random(10).'ما شاء الله صوت في غاية الروعة والجمال .',
            //'color'  =>  'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.9)', //rand color,
             'color'  =>  rand(1,7),
             'status'  => 1 //rand(1,2),
          ] );

          }
          

    }
}
