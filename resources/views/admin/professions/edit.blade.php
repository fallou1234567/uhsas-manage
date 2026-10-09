
@extends('layouts.app')

@section('title', 'Modifier une profession')

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

        <h1 class="h3 fw-bold mt-3 mb-1">Modifier une profession</h1>
        <p class="text-muted mb-0">
            Modifiez les informations de « {{ $profession->name }} ».
        </p>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 850px;">
        <div class="card-header bg-white py-3">
            <h2 class="h6 fw-bold mb-0">Informations de la profession</h2>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('admin.professions.update', $profession) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">
                        Nom de la profession <span class="text-danger">*</span>
                    </label>

                    <input type="text"
                           id="name"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $profession->name) }}"
                           maxlength="255"
                           required
                           autofocus>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <a href="{{ route('admin.professions.show', $profession) }}"
                       class="btn btn-light border">
                        Annuler
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i>
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
