<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('public.site.home');
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
