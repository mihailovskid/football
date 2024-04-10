<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team = Team::all();

        $data = [];

        for ($i = 0; $i < 30; $i++) {
            $data[] = [
                'name'      => fake()->firstName(),
                'surname'   => fake()->lastName(),
                'dob'       => fake()->date(),
                'team_id'   => $team->random(1)->first()->id

            ];
        }

        Player::insert($data);
    }
}
