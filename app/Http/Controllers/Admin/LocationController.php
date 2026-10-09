<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Region;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function regions(Request $request)
    {
        $query = Region::withCount([
            'departments',
            'members',
        ]);

        if ($request->filled('search')) {
            $query->where(
                'name',
                'like',
                '%'.$request->search.'%'
            );
        }

        $regions = $query
            ->orderBy('name')
            ->get();

        return view(
            'admin.locations.regions',
            compact('regions')
        );
    }

    public function departments(Request $request)
    {
        $query = Department::with('region')
            ->withCount([
                'communes',
                'members',
            ]);

        if ($request->filled('search')) {

            $query->where(
                'name',
                'like',
                '%'.$request->search.'%'
            );

        }

        if ($request->filled('region_id')) {

            $query->where(
                'region_id',
                $request->region_id
            );

        }

        $departments = $query
            ->orderBy('name')
            ->get();

        $regions = Region::orderBy('name')->get();

        return view(
            'admin.locations.departments',
            compact(
                'departments',
                'regions'
            )
        );
    }

    public function communes(Request $request)
    {
        $query = Commune::with([
            'department.region',
        ])->withCount('members');

        if ($request->filled('search')) {
            $query->where(
                'name',
                'like',
                '%'.$request->search.'%'
            );
        }

        if ($request->filled('region_id')) {
            $query->whereHas('department', function ($q) use ($request) {
                $q->where('region_id', $request->region_id);
            });
        }

        if ($request->filled('department_id')) {
            $query->where(
                'department_id',
                $request->department_id
            );
        }

        $communes = $query
            ->orderBy('name')
            ->get();

        $regions = Region::orderBy('name')->get();

        $departments = Department::with('region')
            ->orderBy('name')
            ->get();

        return view(
            'admin.locations.communes',
            compact(
                'communes',
                'regions',
                'departments'
            )
        );
    }



    public function storeRegion(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:regions,name'],
        ]);

        Region::create($validated);

        return redirect()
            ->route('admin.locations.regions')
            ->with('success', 'Région enregistrée avec succès.');
    }


}
