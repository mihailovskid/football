<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name'  => fake()->company(),
                'year'  => fake()->year('Y'),
            ];
        }

        Team::insert($data);
    }
}
