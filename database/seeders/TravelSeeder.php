<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $travels = [];
        $faker = Faker::create();

        for($i = 0; $i < 50; $i++){
            $title = $faker->sentence(mt_rand(3,6));
            $title = str_replace('-','',$title);
            $slug = str_replace('','-', strtolower($title));

            $travels[$i] = [
                'title' => $title,
                'slug' => $slug,
                'country' => $faker->country,
                'duration' => "3D 2M",
                'about' =>  "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil porro nemo, provident illo fugiat ducimus voluptas, assumenda quam vero eos deserunt praesentium iste quisquam alias unde enim. Iste, distinctio voluptates?",
                'featured_event' => "tari zaman",
                'language' => $faker->country,
                'food' => "hamburger",
                'departure_date' => $faker->date,
                'type' => "open trip",
                'price' => 1000000,
                'created_by' => 1,
            ];
        }
        DB::table('travel_packages')->insert($travels);

    }
}
