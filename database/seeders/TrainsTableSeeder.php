<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Train;
use Faker\Generator as Faker;
use Illuminate\Support\Testing\Fakes\Fake;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 100; $i++){
            $new_trains = new Train();
            $new_trains->slug = $this->generateSlug($new_trains ->company);
            $new_trains->company = $faker->company();
            $new_trains->departure_station = $faker->city();
            $new_trains->arrival_station = $faker->city();
            $new_trains->departure_time = $faker->time();
            $new_trains->arrival_time = $faker->time();
            $new_trains->train_code = $faker->randomNumber(5, true);
            $new_trains->number_carriage = $faker->numberBetween(1, 30);
            $new_trains->in_time = $faker->boolean();
            $new_trains->is_deleted = $faker->boolean();
            dump($new_trains);
        }
    }

    private function generateSlug($string){
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exist = Train::where('slug', $slug)->first();
        $c = 1;

        while($exist){
            $slug = $original_slug . '-' . $c;
            $exist = Train::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }
}
