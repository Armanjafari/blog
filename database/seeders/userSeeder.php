<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
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
            User::create([
                'name' => "username $item ",
                'email' => "test$item@test.com  ",
                'password' => "123456789",
                'phone' => "0901462712$item"

            ]);
        }
    }
}
