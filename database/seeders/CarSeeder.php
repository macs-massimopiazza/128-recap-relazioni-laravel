<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 20; $i++) {
            $car = new Car();
            $car->model = $faker->randomElement(['model 3', 'model y', 'serie 3', 'a3']);
            $car->production_year = $faker->numberBetween(1990, 2020);
            $car->hp = $faker->numberBetween(70, 400);
            $car->fuel = $faker->randomElement(['petrol', 'diesel', 'electric']);
            $car->image = $faker->imageUrl(640, 480, 'cars', true);
            $car->brand_id = Brand::inRandomOrder()->first()->id;
            $car->save();
        }
    }
}
