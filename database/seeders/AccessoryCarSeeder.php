<?php

namespace Database\Seeders;

use App\Models\Accessory;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoryCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 50; $i++) {
            $car = Car::inRandomOrder()->first();
            $accessory_id = Accessory::inRandomOrder()->first()->id;

            $car->accessories()->attach($accessory_id);
        }

        // $cars = Car::all();
        // $accessories = Accessory::all()->pluck('id')->toArray();
        // foreach ($cars as $car) {
        //     $numAccessories = rand(0, 3);
        //     if ($numAccessories > 0) {
        //         $randomAccessoriesIndexes = array_rand($accessories, $numAccessories);
        //         $randomAccessoriesIndexes = is_array($randomAccessoriesIndexes) ? $randomAccessoriesIndexes : [$randomAccessoriesIndexes];
        //         $randomAccessories = array_map(fn($index) => $accessories[$index], $randomAccessoriesIndexes);
        //         $car->accessories()->attach($randomAccessories);
        //     }
        // }
    }
}
