
@extends('layouts.app')

@section('title', 'Détails de la profession')


@push('styles')
    <link rel="stylesheet" href="{{ asset('asset/css/professions.css') }}">
@endpush

@section('content')

<div class="container-fluid py-4 professions-page">

    <div class="mb-4">
        <a href="{{ route('admin.professions.index') }}"
           class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left me-1"></i> Retour aux professions
        </a>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-3">
            <div>
                <h1 class="h3 fw-bold mb-1">Détails de la profession</h1>
                <p class="text-muted mb-0">
                    Consultez les informations enregistrées.
                </p>
            </div>

            <a href="{{ route('admin.professions.edit', $profession) }}"
               class="btn btn-primary">
                <i class="bi bi-pencil me-1"></i> Modifier
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h2 class="h6 fw-bold mb-0">Informations générales</h2>
                </div>

                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-briefcase fs-2 text-success"></i>
                        </div>

                        <div>
                            <h3 class="h4 fw-bold mb-1">
                                {{ $profession->name }}
                            </h3>
                            <span class="text-muted small">
                                Profession enregistrée dans le référentiel UHSAS
                            </span>
                        </div>
                    </div>

                    <hr>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="text-muted small mb-1">Identifiant</div>
                            <div class="fw-semibold">#{{ $profession->id }}</div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small mb-1">Nom de la profession</div>
                            <div class="fw-semibold">{{ $profession->name }}</div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small mb-1">Date de création</div>
                            <div class="fw-semibold">
                                {{ $profession->created_at?->format('d/m/Y à H:i') ?? '—' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small mb-1">Dernière modification</div>
                            <div class="fw-semibold">
                                {{ $profession->updated_at?->format('d/m/Y à H:i') ?? '—' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 d-inline-flex mb-3">
                        <i class="bi bi-people fs-3 text-warning"></i>
                    </div>

                    <p class="text-muted mb-1">Membres associés</p>

                    <div class="display-5 fw-bold mb-3">
                        {{ $profession->members()->count() }}
                    </div>

                    <p class="text-muted small mb-0">
                        Nombre de membres enregistrés avec cette profession.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
