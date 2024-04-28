<?php

namespace Database\Seeders;

use App\Models\Dislike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DislikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Dislike::factory()
            ->count(10)
            ->create();
    }
}
