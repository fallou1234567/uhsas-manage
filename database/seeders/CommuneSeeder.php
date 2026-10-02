<?php

namespace Database\Seeders;

use App\Models\Commune;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class CommuneSeeder extends Seeder
{
    public function run(): void
    {
        $url = 'https://galsenapi.lassanasiby.com/api/v1/communes/';

        $response = Http::timeout(60)
            ->retry(3, 1000)
            ->get($url, [
                'page_size' => 600,
            ]);

        if (!$response->successful()) {
            throw new RuntimeException(
                'Impossible de récupérer les communes du Sénégal.'
            );
        }

        $data = $response->json();

        $communes = $data['results'] ?? $data['data'] ?? [];

        if (empty($communes)) {
            throw new RuntimeException(
                'Aucune commune trouvée dans la réponse API.'
            );
        }

        foreach ($communes as $item) {

            $name = $item['name']
                ?? $item['name_local']
                ?? null;

            $departmentCode = $item['department']
                ?? $item['departement']
                ?? $item['department_code']
                ?? null;

            if (!$name || !$departmentCode) {
                continue;
            }

            $department = Department::where(
                'code',
                $departmentCode
            )->first();

            if (!$department) {
                continue;
            }

            Commune::updateOrCreate(
                [
                    'department_id' => $department->id,
                    'name' => $name,
                ],
                [
                    'is_active' => true,
                ]
            );
        }
    }
}