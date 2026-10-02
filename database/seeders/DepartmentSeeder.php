<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [

            // Dakar
            [
                'region' => 'SN01',
                'name' => 'Dakar',
                'code' => 'SN0101',
            ],
            [
                'region' => 'SN01',
                'name' => 'Pikine',
                'code' => 'SN0102',
            ],
            [
                'region' => 'SN01',
                'name' => 'Guédiawaye',
                'code' => 'SN0103',
            ],
            [
                'region' => 'SN01',
                'name' => 'Rufisque',
                'code' => 'SN0104',
            ],
            [
                'region' => 'SN01',
                'name' => 'Keur Massar',
                'code' => 'SN0105',
            ],

            // Diourbel
            [
                'region' => 'SN02',
                'name' => 'Diourbel',
                'code' => 'SN0201',
            ],
            [
                'region' => 'SN02',
                'name' => 'Mbacké',
                'code' => 'SN0202',
            ],
            [
                'region' => 'SN02',
                'name' => 'Bambey',
                'code' => 'SN0203',
            ],

            // Fatick
            [
                'region' => 'SN03',
                'name' => 'Fatick',
                'code' => 'SN0301',
            ],
            [
                'region' => 'SN03',
                'name' => 'Foundiougne',
                'code' => 'SN0302',
            ],
            [
                'region' => 'SN03',
                'name' => 'Gossas',
                'code' => 'SN0303',
            ],

            // Kaffrine
            [
                'region' => 'SN04',
                'name' => 'Kaffrine',
                'code' => 'SN0401',
            ],
            [
                'region' => 'SN04',
                'name' => 'Birkilane',
                'code' => 'SN0402',
            ],
            [
                'region' => 'SN04',
                'name' => 'Koungheul',
                'code' => 'SN0403',
            ],
            [
                'region' => 'SN04',
                'name' => 'Malem Hodar',
                'code' => 'SN0404',
            ],

            // Kaolack
            [
                'region' => 'SN05',
                'name' => 'Kaolack',
                'code' => 'SN0501',
            ],
            [
                'region' => 'SN05',
                'name' => 'Guinguinéo',
                'code' => 'SN0502',
            ],
            [
                'region' => 'SN05',
                'name' => 'Nioro du Rip',
                'code' => 'SN0503',
            ],

            // Kédougou
            [
                'region' => 'SN06',
                'name' => 'Kédougou',
                'code' => 'SN0601',
            ],
            [
                'region' => 'SN06',
                'name' => 'Salémata',
                'code' => 'SN0602',
            ],
            [
                'region' => 'SN06',
                'name' => 'Saraya',
                'code' => 'SN0603',
            ],

            // Kolda
            [
                'region' => 'SN07',
                'name' => 'Kolda',
                'code' => 'SN0701',
            ],
            [
                'region' => 'SN07',
                'name' => 'Vélingara',
                'code' => 'SN0702',
            ],
            [
                'region' => 'SN07',
                'name' => 'Médina Yoro Foulah',
                'code' => 'SN0703',
            ],

            // Louga
            [
                'region' => 'SN08',
                'name' => 'Louga',
                'code' => 'SN0801',
            ],
            [
                'region' => 'SN08',
                'name' => 'Kébémer',
                'code' => 'SN0802',
            ],
            [
                'region' => 'SN08',
                'name' => 'Linguère',
                'code' => 'SN0803',
            ],

            // Matam
            [
                'region' => 'SN09',
                'name' => 'Matam',
                'code' => 'SN0901',
            ],
            [
                'region' => 'SN09',
                'name' => 'Kanel',
                'code' => 'SN0902',
            ],
            [
                'region' => 'SN09',
                'name' => 'Ranérou Ferlo',
                'code' => 'SN0903',
            ],

            // Saint-Louis
            [
                'region' => 'SN10',
                'name' => 'Saint-Louis',
                'code' => 'SN1001',
            ],
            [
                'region' => 'SN10',
                'name' => 'Dagana',
                'code' => 'SN1002',
            ],
            [
                'region' => 'SN10',
                'name' => 'Podor',
                'code' => 'SN1003',
            ],

            // Sédhiou
            [
                'region' => 'SN11',
                'name' => 'Sédhiou',
                'code' => 'SN1101',
            ],
            [
                'region' => 'SN11',
                'name' => 'Bounkiling',
                'code' => 'SN1102',
            ],
            [
                'region' => 'SN11',
                'name' => 'Goudomp',
                'code' => 'SN1103',
            ],

            // Tambacounda
            [
                'region' => 'SN12',
                'name' => 'Tambacounda',
                'code' => 'SN1201',
            ],
            [
                'region' => 'SN12',
                'name' => 'Bakel',
                'code' => 'SN1202',
            ],
            [
                'region' => 'SN12',
                'name' => 'Goudiry',
                'code' => 'SN1203',
            ],
            [
                'region' => 'SN12',
                'name' => 'Koumpentoum',
                'code' => 'SN1204',
            ],

            // Thiès
            [
                'region' => 'SN13',
                'name' => 'Thiès',
                'code' => 'SN1301',
            ],
            [
                'region' => 'SN13',
                'name' => 'Mbour',
                'code' => 'SN1302',
            ],
            [
                'region' => 'SN13',
                'name' => 'Tivaouane',
                'code' => 'SN1303',
            ],

            // Ziguinchor
            [
                'region' => 'SN14',
                'name' => 'Ziguinchor',
                'code' => 'SN1401',
            ],
            [
                'region' => 'SN14',
                'name' => 'Bignona',
                'code' => 'SN1402',
            ],
            [
                'region' => 'SN14',
                'name' => 'Oussouye',
                'code' => 'SN1403',
            ],
        ];

        foreach ($departments as $department) {

            $region = Region::where(
                'code',
                $department['region']
            )->firstOrFail();

            Department::updateOrCreate(
                [
                    'code' => $department['code'],
                ],
                [
                    'region_id' => $region->id,
                    'name' => $department['name'],
                    'is_active' => true,
                ]
            );
        }
    }
}