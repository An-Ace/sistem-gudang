<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MutationSeeder;
use Database\Seeders\ItemSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ItemSeeder::class,
            MutationSeeder::class,
        ]);
    }
}
