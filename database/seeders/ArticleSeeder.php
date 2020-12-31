<?php

namespace Database\Seeders;

use App\Models\post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (range(1,10) as $item)
        {
            post::create([
                'title' => "title number $item ",
                'text' => "this a test number $item ",
                'cat_id' => 1,
                'user_email' => "test$item@test.com"

            ]);
        }

    }
}
