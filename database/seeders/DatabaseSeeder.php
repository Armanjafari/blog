<?php

namespace Database\Seeders;

use App\Models\tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([categorySeeder::class]);
        $this->call([userSeeder::class]);
        $this->call([ArticleSeeder::class]);
        $this->call([tagSeeder::class]);

    }
}
