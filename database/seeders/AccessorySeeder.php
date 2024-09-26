<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accessories = [
            "Airbag",
            "ABS",
            "Navigatore satellitare",
            "Sensori di parcheggio",
            "Telecamera posteriore",
            "Climatizzatore automatico",
            "Cruise control"
        ];

        foreach ($accessories as $name) {
            $new_accessory = new Accessory();
            $new_accessory->name = $name;
            $new_accessory->save();
        }
    }
}
