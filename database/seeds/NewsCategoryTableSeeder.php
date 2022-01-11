<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class NewsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('news_categories')->insert([
              'name' => Str::random(10).'صنف'.$i,
              'slug' => Str::random(2).'_category'.$i,
              'short_description' => Str::random(10).'ما شاء الله صوت في غاية الروعة والجمال😊😊😊 .',
              'color'  =>  rand(1,7),
              'status'  => 1 //rand(1,2),
              
            ] );
  
            }
    }
}
