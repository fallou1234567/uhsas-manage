<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function show(Member $member): View
    {
        $member->load([
            'profession',
            'region',
            'department',
            'commune',
            'card',
        ]);

        return view(
            'member.public',
            compact('member')
        );
    }
}