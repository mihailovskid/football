<?php

namespace App\Console\Commands;

use App\Models\Matche;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RandomResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:result';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create random result for match';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date_limit = now()->subDay();
        $date_limit = $date_limit->format('Y-m-d');

        $matches = Matche::whereNull('home_score')
            ->whereNull('away_score')
            ->where('game_date', '>=', $date_limit)
            ->where('game_date', '<=', now()->format('Y-m-d'))
            ->get();

        foreach ($matches as $match) {
            $match->update([
                'home_score'    => rand(0, 7),
                'away_score'    => rand(0, 5)
            ]);
        }
    }
}
