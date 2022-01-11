<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class RadioProgramTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            DB::table('radio_programs')->insert([
                'time' => 'أخبار'.$i,
                'title' => Str::random(10).'برنامج '.$i,
                'description' => Str::random(10).'برنامج ممتع .',
                'created_at' =>  DB::raw('now()')
            ]);
        }
    }
}
