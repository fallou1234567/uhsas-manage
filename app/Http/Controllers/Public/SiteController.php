<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\Member;
use App\Models\Profession;
use App\Models\Region;

class SiteController extends Controller
{
    public function home(): View
    {
        // view('public.site.home');

        $totalMembers = Member::count();

        $activeMembers = Member::where('status', 'active')->count();

        $totalProfessions = Profession::count();

        $totalRegions = Region::count();

        return view('public.site.home', compact(
            'totalMembers',
            'activeMembers',
            'totalProfessions',
            'totalRegions'
        ));
    }

    public function about(): View
    {
        return view('public.site.about');
    }

    public function activities(): View
    {
        return view('public.site.activities');
    }

    public function projects(): View
    {
        return view('public.site.projects');
    }

    public function partners(): View
    {
        return view('public.site.partners');
    }

    public function news(): View
    {
        return view('public.site.news');
    }

    public function contact(): View
    {
        return view('public.site.contact');
    }
}
