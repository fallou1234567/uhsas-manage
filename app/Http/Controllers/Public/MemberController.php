<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MemberController extends Controller
{
    public function show(Member $member)
    {
        $member->load([
            'profession',
            'region',
            'department',
            'commune',
            'card',
        ]);

        return view('member.public', compact('member'));
    }

    public function qr(Member $member): Response
    {
        $url = route('member.public', [
            'member' => $member->id,
        ]);

        $svg = QrCode::format('svg')
            ->size(300)
            ->margin(2)
            ->errorCorrection('H')
            ->generate($url);

        return response($svg, 200)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
