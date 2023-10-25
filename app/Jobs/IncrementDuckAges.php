<?php

namespace App\Jobs;

use App\Models\Duck;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IncrementDuckAges implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach (Duck::all() as $duck) {
            $age = $duck->age;
            $maxAge = config('app.duck.max_age');

            if ($age == $maxAge) {
                $duck->status = 'dead';
                $duck->save();
                continue;
            }
            $duck->age++;
            if ($duck->status == 'egg' && $duck->age >= 5) {
                $duck->status = 'alive';
            }

            if ($duck->stomach_fill > 0) {
                $duck->stomach_fill = max(0,$duck->stomach_fill - $duck->stomach_empty_rate);
            }

            $duck->mass += min($duck->growth_rate,config('app.duck.max_mass'));



            $duck->save();

        }
    }
}
