<?php

namespace App\Http\Controllers;

use App\Models\ProfitSharing;
use Illuminate\Http\Request;

class ProfitSharingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'farmer_id' => 'required|integer|exists:users,id',
            'ratio' => 'required|numeric|min:0|max:1',
        ]);

        $profitSharing = ProfitSharing::create([
            'farmer_id' => $request->farmer_id,
            'ratio' => $request->ratio,
        ]);

        return response()->json($profitSharing, 201);
    }

    public function show($farmerId)
    {
        $ratio = ProfitSharing::where('farmer_id', $farmerId)->first();
        return response()->json($ratio);
    }
}
