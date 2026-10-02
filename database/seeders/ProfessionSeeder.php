<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    public function run(): void
    {
        $professions = [
            'Maçon',
            'Menuisier',
            'Électricien',
            'Plombier',
            'Peintre',
            'Carreleur',
            'Ferrailleur',
            'Charpentier',
            'Soudeur',
            'Couvreur',
            'Vitrier',
            'Mécanicien',
            'Architecte',
            'Technicien',
            'Autre',
        ];

        foreach ($professions as $profession) {
            Profession::updateOrCreate(
                ['name' => $profession],
                ['is_active' => true]
            );
        }
    }
}