<?php

namespace App\Listeners;

use App\Events\MovieCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddMovieToPlan
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MovieCreated  $event
     * @return void
     */
    public function handle(MovieCreated $event)
    {
        // here should be the code for sending data to subscriptions microservices for adding the movie to a plan.
    }
}
