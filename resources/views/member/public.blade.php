@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/uhsas-card.css') }}">
@php
$statusLabels=['pending'=>'EN ATTENTE','active'=>'MEMBRE ACTIF','late'=>'COTISATION EN RETARD','expired'=>'ADHÉSION EXPIRÉE','suspended'=>'MEMBRE SUSPENDU'];
$status=$member->status ?? 'pending';$statusLabel=$statusLabels[$status] ?? strtoupper(str_replace('_',' ',$status));
$validUntil=$member->membership_expires_at ?? ($member->card?->expires_at ?? null);
@endphp
<div class="uhsas-page"><div class="uhsas-shell">
<header class="uhsas-public-heading"><h1>Carte de membre UHSAS</h1><p>Vérification des informations d’adhésion</p></header>
<div class="uhsas-frame">@include('member.card-design',['member'=>$member])</div>
<div class="uhsas-verify">Statut de la carte : <strong>{{ $statusLabel }}</strong>@if($validUntil) · Valable jusqu’au <strong>{{ \Illuminate\Support\Carbon::parse($validUntil)->format('d/m/Y') }}</strong>@endif</div>
</div></div>
@endsection
