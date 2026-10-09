<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use App\Models\Member;
use App\Models\Region;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques des membres
        $totalMembers = Member::count();

        $activeMembers = Member::where('status', 'active')->count();

        $pendingMembers = Member::where('status', 'pending')->count();

        // Cotisations réellement encaissées
        $totalContributions = Contribution::where('status', 'paid')
            ->sum('amount');

        // Montant des cotisations en attente
        $pendingContributions = Contribution::where('status', 'pending')
            ->sum('amount');

        // Nombre de cotisations payées
        $paidContributions = Contribution::where('status', 'paid')
            ->count();

        // Taux de recouvrement calculé à partir des montants
        $totalExpected = $totalContributions + $pendingContributions;

        $contributionPercentage = $totalExpected > 0
            ? round(($totalContributions / $totalExpected) * 100, 2)
            : 0;

        // Derniers membres enregistrés
        $recentMembers = Member::with(['profession', 'region'])
            ->latest('registered_at')
            ->take(8)
            ->get();

        // Répartition des membres par région
        $membersByRegion = Region::query()
            ->withCount('members')
            ->orderByDesc('members_count')
            ->get();

        $membersByRegion->each(function ($region) use ($totalMembers) {
            $region->percentage = $totalMembers > 0
                ? round(($region->members_count / $totalMembers) * 100, 2)
                : 0;
        });

        return view('admin.dashboard', compact(
            'totalMembers',
            'activeMembers',
            'pendingMembers',
            'totalContributions',
            'paidContributions',
            'pendingContributions',
            'contributionPercentage',
            'recentMembers',
            'membersByRegion'
        ));
    }
}
