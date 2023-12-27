<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        District::create([
            'id' => 1,
            'region_id' => 1,
            'name' => 'District 1'
        ]);
        District::create([
            'id' => 2,
            'region_id' => 2,
            'name' => 'District 2'
        ]);
        District::create([
            'id' => 3,
            'region_id' => 3,
            'name' => 'District 3'
        ]);
        //     $json = File::get('C:\Users\azizd\Desktop\laravel-vue-filter\database\seeders\districts.json');
        //     $data = json_decode($json, true);

        //     $districts = $data['Data']['table_districts']['districts'];

        //     foreach ($districts as $district) {
        //         District::create([
        //             'id' => $district['_id'],
        //             'region_id' => $district['_region_id'],
        //             'name' => $district['_name_uz'],
        //         ]);
        //     }
    }
}
