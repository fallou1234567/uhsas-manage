<?php

namespace Database\Seeders;

use App\Models\ContributionType;
use Illuminate\Database\Seeder;

class ContributionTypeSeeder extends Seeder
{
    public function run(): void
    {
        $year = now()->year;

        $amounts = [
            5000,
            10000,
            15000,
            20000,
            25000,
        ];

        foreach ($amounts as $amount) {
            ContributionType::updateOrCreate(
                [
                    'amount' => $amount,
                    'year' => $year,
                ],
                [
                    'name' => 'Cotisation ' .
                        number_format($amount, 0, ',', ' ') .
                        ' FCFA',
                    'is_active' => true,
                ]
            );
        }
    }
}