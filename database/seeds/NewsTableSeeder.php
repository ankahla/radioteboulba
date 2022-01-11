<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {
            DB::table('news')->insert([
                'category_id' => rand(1,5),
                'slug' => 'أخبار'.$i,
                'title' => Str::random(10).'أخبار'.$i,
                'content' => "<ul>
                        <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                        <li>Aliquam tincidunt mauris eu risus.</li>
                        <li>Vestibulum auctor dapibus neque.</li>
                    </ul>",

                'short_description' => Str::random(10).'ما شاء الله صوت في غاية الروعة والجمال .',
                'status' => rand(1,2),
                'hot' => rand(0,1),
                'created_at' =>  DB::raw('now()')

            ]);
            }
    }
}
