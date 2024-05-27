<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beer;
use App\Functions\Helper;
use Faker\Generator as Faker;
use App\Models\Category;
use Ramsey\Uuid\Type\Integer;

class BeerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $beers_ale = json_decode(file_get_contents('https://api.sampleapis.com/beers/ale'));

        $beers_stout = json_decode(file_get_contents('https://api.sampleapis.com/beers/stouts'));

        $ale_id = Category::where('name', 'ale')->first()->id;
        $stout_id = Category::where('name', 'stout')->first()->id;

        foreach ($beers_ale as $beer) {
            $new_beer = new Beer();
            $new_beer->category_id = $ale_id;
            $new_beer->name = $beer->name;
            $new_beer->slug = Helper::createSlug($new_beer->name, Beer::class);
            $new_beer->price = floatval(str_replace('$', '', $beer->price));
            $new_beer->rating_average = $beer->rating->average;
            $new_beer->thumb = $beer->image;
            $new_beer->volume = $faker->randomFloat(1, 1, 15);
            $new_beer->pieces = $faker->randomNumber(1, 100);

            $new_beer->save();
        }

        foreach ($beers_stout as $beer) {
            $new_beer = new Beer();
            $new_beer->category_id = $stout_id;
            $new_beer->name = $beer->name;
            $new_beer->slug = Helper::createSlug($new_beer->name, Beer::class);
            $new_beer->price = floatval(str_replace('$', '', $beer->price));
            $new_beer->rating_average = $beer->rating->average;
            $new_beer->thumb = $beer->image;
            $new_beer->volume = $faker->randomFloat(1, 1, 15);
            $new_beer->pieces = $faker->randomNumber(1, 100);

            $new_beer->save();
        }
    }
}
