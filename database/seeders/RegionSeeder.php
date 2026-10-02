<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $regions = [
            [
                'name' => 'Dakar',
                'code' => 'SN01',
            ],
            [
                'name' => 'Diourbel',
                'code' => 'SN02',
            ],
            [
                'name' => 'Fatick',
                'code' => 'SN03',
            ],
            [
                'name' => 'Kaffrine',
                'code' => 'SN04',
            ],
            [
                'name' => 'Kaolack',
                'code' => 'SN05',
            ],
            [
                'name' => 'Kédougou',
                'code' => 'SN06',
            ],
            [
                'name' => 'Kolda',
                'code' => 'SN07',
            ],
            [
                'name' => 'Louga',
                'code' => 'SN08',
            ],
            [
                'name' => 'Matam',
                'code' => 'SN09',
            ],
            [
                'name' => 'Saint-Louis',
                'code' => 'SN10',
            ],
            [
                'name' => 'Sédhiou',
                'code' => 'SN11',
            ],
            [
                'name' => 'Tambacounda',
                'code' => 'SN12',
            ],
            [
                'name' => 'Thiès',
                'code' => 'SN13',
            ],
            [
                'name' => 'Ziguinchor',
                'code' => 'SN14',
            ],
        ];

        foreach ($regions as $region) {
            Region::updateOrCreate(
                ['code' => $region['code']],
                [
                    'name' => $region['name'],
                    'is_active' => true,
                ]
            );
        }
    }
}