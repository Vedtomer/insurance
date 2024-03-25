<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\PointRedemption;
use Illuminate\Http\Request;

class PointRedemptionController extends Controller
{
    public function index(Request $request)
    {
        $inProgressPoints = PointRedemption::with('agent')->where('status', 'completed')->get();
        $agents = Agent::get();

        return view('admin.point.index', ['points' => $inProgressPoints, 'agents' => $agents]);
    }

    public function ReedemRequest(Request $request)
    {
        $inProgressPoints = PointRedemption::with('agent')->where('status', 'in_progress')->get();
        $agents = Agent::get();
        return view('admin.point.request', ['points' => $inProgressPoints, 'agents' => $agents]);
    }

    public function redeemSuccess(Request $request, $pointId)
    {
        $pointRedemption = PointRedemption::findOrFail($pointId);
        $pointRedemption->status = 'completed';
        $pointRedemption->save();
        return response()->json(['message' => 'Point redemption marked as successful.']);
    }
}
