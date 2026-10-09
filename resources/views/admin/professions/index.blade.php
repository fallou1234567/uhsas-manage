
@extends('layouts.app')

@section('title', 'Gestion des professions')

@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/professions.css') }}">
@endpush

@section('content')

<div class="container-fluid py-4 professions-page">


<div class="page-heading d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div class="page-heading-text">
        <h1>Gestion des professions</h1>
        <p>Consultez et gérez les professions des membres de l'UHSAS.</p>
    </div>

    <a href="{{ route('admin.professions.create') }}"
       class="btn btn-success profession-add-btn align-items-right ">
        <i class="bi bi-plus-lg me-1"></i>
        Ajouter une profession
    </a>
</div>


    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.professions.index') }}"
                  method="GET"
                  class="row g-3 align-items-end">

                <div class="col-md-8">
                    <label for="search" class="form-label">
                        Rechercher une profession
                    </label>
                    <input type="text"
                           id="search"
                           name="search"
                           class="form-control"
                           placeholder="Ex. : Maçon, peintre, électricien..."
                           value="{{ request('search') }}">
                </div>

                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-dark">
                        <i class="bi bi-search me-1"></i> Rechercher
                    </button>

                    <a href="{{ route('admin.professions.index') }}"
                       class="btn btn-outline-secondary">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-success bg-opacity-10 p-3">
                        <i class="bi bi-briefcase fs-4 text-success"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Professions affichées</div>
                        <div class="h4 fw-bold mb-0">
                            {{ $professions->total() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <h2 class="h6 fw-bold mb-0">Liste des professions</h2>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Nom de la profession</th>
                            <th>Membres associés</th>
                            <th>Date de création</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($professions as $profession)
                            <tr>
                                <td class="ps-4">
                                    {{ $professions->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <div class="fw-semibold">
                                        {{ $profession->name }}
                                    </div>
                                </td>

                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success">
                                        {{ $profession->members_count ?? $profession->members()->count() }}
                                        membre(s)
                                    </span>
                                </td>

                                <td>
                                    {{ $profession->created_at?->format('d/m/Y') ?? '—' }}
                                </td>

                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.professions.show', $profession) }}"
                                           class="btn btn-sm btn-outline-info"
                                           title="Voir les détails">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.professions.edit', $profession) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Modifier">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.professions.destroy', $profession) }}"
                                              method="POST"
                                              onsubmit="return confirm('Voulez-vous vraiment supprimer cette profession ?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Supprimer">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <i class="bi bi-briefcase fs-1 text-muted"></i>
                                    <p class="fw-semibold mt-2 mb-1">
                                        Aucune profession trouvée
                                    </p>
                                    <p class="text-muted small mb-3">
                                        Ajoutez une profession ou modifiez votre recherche.
                                    </p>
                                    <a href="{{ route('admin.professions.create') }}"
                                       class="btn btn-success btn-sm">
                                        Ajouter une profession
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($professions->hasPages())
            <div class="card-footer bg-white">
                {{ $professions->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
