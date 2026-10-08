<?php

namespace Database\Seeders;

use App\Models\Commune;
use App\Models\Department;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Région Dakar
        |--------------------------------------------------------------------------
        |
        | Structure :
        | Dakar
        |   └── Département
        |        └── Commune d'arrondissement
        |
        */

        $communes = [

            /*
            |--------------------------------------------------------------------------
            | Département de Dakar
            |--------------------------------------------------------------------------
            */

            'SN0101' => [
                'Plateau',
                'Médina',
                'Fann-Point E-Amitié',
                'Gueule Tapée-Fass-Colobane',
                'Gorée',
                'Grand Dakar',
                'Biscuiterie',
                'Hann Bel-Air',
                'HLM',
                'Sicap-Liberté',
                'Dieuppeul-Derklé',
                'Mermoz-Sacré-Cœur',
                'Ouakam',
                'Ngor',
                'Yoff',
                'Cambérène',
                'Parcelles Assainies',
            ],

            /*
            |--------------------------------------------------------------------------
            | Département de Pikine
            |--------------------------------------------------------------------------
            */

            'SN0102' => [
                'Pikine Est',
                'Pikine Nord',
                'Pikine Ouest',
                'Dalifort',
                'Djiddah Thiaroye Kao',
                'Guinaw Rail Nord',
                'Guinaw Rail Sud',
                'Thiaroye Gare',
                'Thiaroye-sur-Mer',
                'Tivaouane Diacksao',
                'Diamaguène Sicap Mbao',
                'Mbao',
            ],

            /*
            |--------------------------------------------------------------------------
            | Département de Guédiawaye
            |--------------------------------------------------------------------------
            */

            'SN0103' => [
                'Golf Sud',
                'Sam Notaire',
                'Ndiarème Limamoulaye',
                'Wakhinane Nimzatt',
                'Médina Gounass',
            ],

            /*
            |--------------------------------------------------------------------------
            | Département de Rufisque
            |--------------------------------------------------------------------------
            */

            'SN0104' => [
                'Rufisque Est',
                'Rufisque Nord',
                'Rufisque Ouest',
                'Bargny',
                'Sébikotane',
                'Diamniadio',
                'Jaxaay-Parcelles',
                'Tivaouane Peulh-Niaga',
                'Yène',
                'Sangalkam',
            ],

            /*
            |--------------------------------------------------------------------------
            | Département de Keur Massar
            |--------------------------------------------------------------------------
            */

            'SN0105' => [
                'Keur Massar Nord',
                'Keur Massar Sud',
                'Jaxaay-Parcelles',
                'Malika',
                'Yeumbeul Nord',
                'Yeumbeul Sud',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | Import des communes
        |--------------------------------------------------------------------------
        */

        foreach ($communes as $departmentCode => $departmentCommunes) {

            $department = Department::where(
                'code',
                $departmentCode
            )->first();

            if (!$department) {
                $this->command->warn(
                    "Département introuvable : {$departmentCode}"
                );

                continue;
            }

            foreach ($departmentCommunes as $communeName) {

                Commune::updateOrCreate(
                    [
                        'department_id' => $department->id,
                        'name' => $communeName,
                    ],
                    [
                        'is_active' => true,
                    ]
                );
            }
        }

        $this->command->info(
            'Communes d\'arrondissement importées avec succès.'
        );
    }
}