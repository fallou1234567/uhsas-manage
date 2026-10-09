@php
$statusLabels=['pending'=>'EN ATTENTE','active'=>'MEMBRE ACTIF','late'=>'COTISATION EN RETARD','expired'=>'ADHÉSION EXPIRÉE','suspended'=>'MEMBRE SUSPENDU'];
$status=$member->status ?? 'pending';
$statusLabel=$statusLabels[$status] ?? strtoupper(str_replace('_',' ',$status));
$validUntil=$member->membership_expires_at ?? ($member->card?->expires_at ?? null);
@endphp
<div class="uhsas-card">
 <div class="uhsas-card-content">
  <div class="uhsas-top">
   <div class="uhsas-org">
    <img class="uhsas-logo" src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS">
    <div class="uhsas-org-name">UNION HABITAT SOLIDAIRE<br>DES ARTISANS DU <span class="uhsas-gold">SÉNÉGAL</span></div>
   </div>
   <div class="uhsas-status">{{ $statusLabel }}</div>
  </div>
  <div class="uhsas-heading"><small>DOCUMENT OFFICIEL</small><h2>CARTE DE MEMBRE</h2></div>
  <div class="uhsas-main">
   <div>
    @if($member->photo)<img class="uhsas-photo" src="{{ asset('storage/'.$member->photo) }}" alt="Photo du membre">
    @else<div class="uhsas-photo-placeholder">PHOTO</div>@endif
   </div>
   <div class="uhsas-info">
    <div class="uhsas-info-item full"><span class="uhsas-label">Nom complet</span><span class="uhsas-value name">{{ $member->full_name }}</span></div>
    <div class="uhsas-info-item"><span class="uhsas-label">Profession</span><span class="uhsas-value">{{ $member->profession?->name ?? 'Non renseigné' }}</span></div>
    <div class="uhsas-info-item"><span class="uhsas-label">Numéro membre</span><span class="uhsas-value">{{ $member->member_number ?? 'En attente' }}</span></div>
    <div class="uhsas-info-item"><span class="uhsas-label">Téléphone</span><span class="uhsas-value">{{ $member->phone ?? 'Non renseigné' }}</span></div>
    <div class="uhsas-info-item"><span class="uhsas-label">Localité</span><span class="uhsas-value">{{ $member->commune?->name ?? $member->address ?? 'Non renseignée' }}</span></div>
   </div>
   <div class="uhsas-qr-area"><div class="uhsas-qr">{!! QrCode::format('svg')->size(220)->margin(0)->generate(route('member.public',$member)) !!}</div><div class="uhsas-qr-label">Vérifier la carte</div></div>
  </div>
  <div class="uhsas-bottom"><div class="uhsas-motto">SOLIDARITÉ • HABITAT • PROFESSIONNALISME</div><div class="uhsas-valid"><small>VALABLE JUSQU'AU</small><strong>{{ $validUntil ? \Illuminate\Support\Carbon::parse($validUntil)->format('d/m/Y') : 'À CONFIRMER' }}</strong></div></div>
 </div>
</div>
