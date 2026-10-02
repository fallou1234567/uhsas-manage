<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'membership_current_year',
                'value' => now()->year,
                'type' => 'integer',
            ],
            [
                'key' => 'membership_deadline',
                'value' => now()->year . '-12-31',
                'type' => 'string',
            ],
            [
                'key' => 'grace_period_days',
                'value' => 0,
                'type' => 'integer',
            ],
            [
                'key' => 'organization_name',
                'value' => 'UHSAS',
                'type' => 'string',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'type' => $setting['type'],
                ]
            );
        }
    }
}