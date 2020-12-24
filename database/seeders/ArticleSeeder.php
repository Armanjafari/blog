<?php

namespace Database\Seeders;

use App\Models\post;
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
        foreach (range(1,10)as $item) {
            post::create([
                'text' => "this is test number $item",
                'cat_id' => 1
            ]);
        }
    }
}
