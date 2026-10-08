<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMembers = Member::count();

        $activeMembers = Member::where('status', 'active')->count();

        $pendingMembers = Member::where('status', 'pending')->count();

        $recentMembers = Member::with([
            'profession',
            'region',
        ])
        ->latest('registered_at')
        ->take(8)
        ->get();

        return view('admin.dashboard', compact(
            'totalMembers',
            'activeMembers',
            'pendingMembers',
            'recentMembers'
        ));
    }
}