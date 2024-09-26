<?php

namespace Database\Seeders;

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
            $car->plate = $faker->word();
            $car->vin = $faker->text(17);
            $car->n_doors = $faker->numberBetween(3, 7);
            $car->displacement = $faker->numberBetween(1000, 4000);
            $car->hp = $faker->numberBetween(70, 400);
            $car->fuel = $faker->randomElement(['petrol', 'diesel', 'electric']);
            $car->save();
        }
    }
}
