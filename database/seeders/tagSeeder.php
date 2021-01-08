<?php

namespace Database\Seeders;

use App\Models\tag;
use Illuminate\Database\Seeder;

class tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $item)
        {
            tag::create([
                'name' => "tag $item "
            ]);
        }
    }
}
