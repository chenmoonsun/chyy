<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('articles')->delete();
        DB::table('articles')->truncate();

        for ($i=0; $i < 100; $i++) {
            \App\Article::create([
                'title'   => 'Title '.$i,
                'body'    => 'Body '.$i,
                'user_id' => 1,
            ]);
        }
    }
}