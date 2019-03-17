<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Actor;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Movie::truncate();
    	Actor::truncate();
        DB::table('actor_movie')->truncate();

        $moviesQuantity = 100;
        $actorsQuantity = 300;
        $actorsMoviesQuantity = 200;

        factory(Movie::class, $moviesQuantity)->create();
        factory(Actor::class, $actorsQuantity)->create();

		factory(Actor::class, $actorsMoviesQuantity)->create()->each(
			function ($actor) {
				$movies = Movie::all()->random(mt_rand(1, 100))->pluck('id');
				$actor->movies()->attach($movies);
			}
		);      
    }
}
