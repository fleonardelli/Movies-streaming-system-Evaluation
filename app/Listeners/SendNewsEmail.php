<?php

namespace App\Listeners;

use App\Events\MovieCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsEmail
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
    public function handle(MovieCreated $movie)
    {
        // here should be the code for getting the users who has active subscription and send an email telling about a new movie.
    }
}
