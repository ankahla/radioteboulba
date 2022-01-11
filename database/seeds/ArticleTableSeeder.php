<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 30; $i++) { 
        DB::table('articles')->insert([
            'category_id' => rand(1,5),
            'author_id' =>  1,
            'slug' => 'مقالة'.$i,
            'title' => Str::random(10).'مقالة'.$i,
                    'content' => "<ul>
                    <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                    <li>Aliquam tincidunt mauris eu risus.</li>
                    <li>Vestibulum auctor dapibus neque.</li>
                </ul>",
                  
          
       
            'short_description' =>Str::random(10).' ارجو حذف المقطع ',
            'status' => rand(1,2),
           /*  'views' => rand(1,999), */
            'hot' => rand(0,1),
            'created_at' =>  DB::raw('now()')
           
        ]);
        }
    }
}
