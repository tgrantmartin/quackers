<?php

namespace App\Observers;

use App\Models\Duck;

class DuckObserver
{
    /**
     * Handle the Duck "created" event.
     */
    public function creating(Duck $duck): void
    {
        $genders = Duck::GENDERS;
        $statuses = Duck::STATUSES;
        $demeanors = Duck::DEMEANORS;
        $duck->color = rand(0,255).rand(0,255).rand(0,255);
        $duck->status = $duck->status ?? $statuses[array_rand($statuses)];
        $max_age = config('app.duck.max_age');
        if($duck->status == 'egg') {
            $max_age = config('app.duck.max_egg_age');
        }
        $duck->age = rand(0,$max_age);
        $duck->gender = $duck->gender ?? $genders[array_rand($genders)];
        $duck->mass = rand(0,config('app.duck.max_mass'));
        $duck->stomach_capacity = rand(1,config('app.duck.max_stomach_capacity'));
        if($duck->gender == 'Female') {
            $duck->lay_rate = rand(1, config('app.duck.max_lay_rate'));
        }
        $duck->growth_rate = rand(0,config('app.duck.max_growth_rate'));
        $duck->speed = rand(0,config('app.duck.max_speed'));
        $duck->endurance = rand(0,config('app.duck.max_endurance'));
        $duck->luck = rand(0,config('app.duck.max_luck'));
        $duck->intelligence = rand(0,config('app.duck.max_intelligence'));
        $duck->strength = rand(0,config('app.duck.max_strength'));
        $duck->feathers = rand(config('app.duck.min_feathers'),config('app.duck.max_feathers'));
        $duck->volume = rand(0,config('app.duck.max_volume'));
        $duck->stomach_empty_rate = rand(1,config('app.duck.max_stomach_empty_rate'));
        $duck->demeanor = $duck->demeanor ?? $demeanors[array_rand($demeanors)];

    }

    /**
     * Handle the Duck "updated" event.
     */
    public function updated(Duck $duck): void
    {
        //
    }

    /**
     * Handle the Duck "deleted" event.
     */
    public function deleted(Duck $duck): void
    {
        //
    }

    /**
     * Handle the Duck "restored" event.
     */
    public function restored(Duck $duck): void
    {
        //
    }

    /**
     * Handle the Duck "force deleted" event.
     */
    public function forceDeleted(Duck $duck): void
    {
        //
    }
}
