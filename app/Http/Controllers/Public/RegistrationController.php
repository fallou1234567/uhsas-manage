<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Department;
use App\Models\Member;
use App\Models\Profession;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('public.registration', [
            'regions' => Region::where('is_active', true)
                ->orderBy('name')
                ->get(),

            'professions' => Profession::where('is_active', true)
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function departments(Region $region)
    {
        return response()->json(
            $region->departments()
                ->where('is_active', true)
                ->orderBy('name')
                ->get(['id', 'name'])
        );
    }

    public function communes(Department $department)
    {
        return response()->json(
            $department->communes()
                ->where('is_active', true)
                ->orderBy('name')
                ->get(['id', 'name'])
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],

            'last_name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'birth_date' => [
                'nullable',
                'date',
            ],

            'gender' => [
                'nullable',
                'in:male,female,other',
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'profession_id' => [
                'required',
                'exists:professions,id',
            ],

            'region_id' => [
                'required',
                'exists:regions,id',
            ],

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'commune_id' => [
                'nullable',
                'exists:communes,id',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'terms' => [
                'required',
                'accepted',
            ],
        ]);

        $member = DB::transaction(function () use ($validated, $request) {

            $lastMember = Member::query()
                ->lockForUpdate()
                ->latest('id')
                ->first();

            $nextNumber = $lastMember
                ? $lastMember->id + 1
                : 1;

            $memberNumber = 'UHSAS-' .
                str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            $photoPath = null;

            if ($request->hasFile('photo')) {
                $photoPath = $request
                    ->file('photo')
                    ->store('members/photos', 'public');
            }

            return Member::create([
                'member_number' => $memberNumber,

                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],

                'phone' => $validated['phone'],
                'email' => $validated['email'] ?? null,

                'birth_date' => $validated['birth_date'] ?? null,
                'gender' => $validated['gender'] ?? null,

                'photo' => $photoPath,

                'profession_id' => $validated['profession_id'],

                'region_id' => $validated['region_id'],
                'department_id' => $validated['department_id'],
                'commune_id' => $validated['commune_id'] ?? null,

                'address' => $validated['address'] ?? null,

                'registration_source' => 'self',

                'status' => 'pending',

                'registered_at' => now(),

                'notes' => $validated['notes'] ?? null,
            ]);
        });

        return redirect()
            ->route('registration.success', $member)
            ->with('success', 'Votre inscription a été enregistrée.');
    }

    public function success(Member $member)
    {
        return view('public.registration-success', compact('member'));
    }
}