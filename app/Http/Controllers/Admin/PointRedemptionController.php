<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PointRedemption;
use Illuminate\Http\Request;

class PointRedemptionController extends Controller
{
    public function index(Request $request)
{
    $inProgressPoints = PointRedemption::where('status', 'in_progress')->get();

    return view('admin.point.index', ['points' => $inProgressPoints]);
}
}
