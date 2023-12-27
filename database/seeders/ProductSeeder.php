<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'title' => 'Product 1',
                'district_id' => 1,
                'region_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Product 2',
                'district_id' => 1,
                'region_id' => 1,
            ],
            [
                'id' => 3,
                'title' => 'Product 3',
                'district_id' => 2,
                'region_id' => 2,
            ],
            [
                'id' => 4,
                'title' => 'Product 4',
                'district_id' => 2,
                'region_id' => 2,
            ],
            [
                'id' => 5,
                'title' => 'Product 5',
                'district_id' => 3,
                'region_id' => 3,
            ],
            [
                'id' => 6,
                'title' => 'Product 6',
                'district_id' => 3,
                'region_id' => 3,
            ],
        ]);
    }
}
