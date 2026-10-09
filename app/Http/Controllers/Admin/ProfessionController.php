<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfessionController extends Controller
{
    /**
     * Afficher la liste des professions.
     */
    public function index(Request $request)
    {
    $search = $request->input('search');

        $professions = Profession::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.professions.index', compact(
            'professions',
            'search'
        ));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        return view('admin.professions.create');
    }

    /**
     * Enregistrer une nouvelle profession.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            'unique:professions,name',
        ],
    ], [
        'name.required' => 'Le nom de la profession est obligatoire.',
        'name.unique' => 'Cette profession existe déjà.',
        'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
    ]);

    $validated['is_active'] = true;

    Profession::create($validated);

    return redirect()
        ->route('admin.professions.index')
        ->with('success', 'Profession enregistrée avec succès.');
}

    /**
     * Afficher une profession.
     */
    public function show(Profession $profession)
    {
        return view('admin.professions.show', compact('profession'));
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Profession $profession)
    {
        return view('admin.professions.edit', compact('profession'));
    }

    /**
     * Mettre à jour une profession.
     */
    public function update(Request $request, Profession $profession)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('professions', 'name')
                    ->ignore($profession->id),
            ],
        ], [
            'name.required' => 'Le nom de la profession est obligatoire.',
            'name.unique' => 'Cette profession existe déjà.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
        ]);

        $profession->update($validated);

        return redirect()
            ->route('admin.professions.index')
            ->with('success', 'Profession modifiée avec succès.');
    }

    /**
     * Supprimer une profession.
     */
    public function destroy(Profession $profession)
    {
        // Évite la suppression si des membres utilisent cette profession.
        if ($profession->members()->exists()) {
            return redirect()
                ->route('admin.professions.index')
                ->with(
                    'error',
                    'Impossible de supprimer cette profession : elle est associée à des membres.'
                );
        }

        $profession->delete();

        return redirect()
            ->route('admin.professions.index')
            ->with('success', 'Profession supprimée avec succès.');
    }
}
