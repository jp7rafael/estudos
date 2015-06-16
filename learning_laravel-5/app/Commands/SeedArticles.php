<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Faker\Factory;
use App\Article;
use App\User;

class SeedArticles extends Command implements SelfHandling, ShouldBeQueued {

    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $attributes = [
              'title' => $faker->sentence,
              'body' => $faker->realText($maxNbChars = 500, $indexSize = 2),
              'published_at' => $faker->dateTime->format('Y-m-d')
            ];
            $article = User::first()->articles()->create($attributes);
            $article->setTags([$faker->realText($maxNbChars = 10, $indexSize = 1)]);
        }
    }

}
