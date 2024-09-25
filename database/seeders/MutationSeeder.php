<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mutation;

class MutationSeeder extends Seeder
{
    public function run()
    {
        Mutation::factory()->count(20)->create();
    }
}
