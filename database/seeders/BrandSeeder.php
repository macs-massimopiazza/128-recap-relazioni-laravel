<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['bmw', 'tesla', 'simoneCompany'];

        foreach ($brands as $name) {
            $new_brand = new Brand();
            $new_brand->name = $name;
            $new_brand->save();
        }
    }
}
