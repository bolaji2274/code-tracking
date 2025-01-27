<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    public function index()
    {
        return response()->json(Livestock::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'feed_type' => 'required|string',
            'drug_type' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $livestock = Livestock::create($request->all());

        return response()->json(['message' => 'Livestock added successfully', 'data' => $livestock]);
    }
    public function lowStock()
    {
        $lowStockLivestock = Livestock::where('quantity', '<', 10)->get();
        return response()->json($lowStockLivestock);
    }

    public function updateQuantity(Request $request, $id)
    {
        $livestock = Livestock::findOrFail($id);
        $livestock->quantity = $request->quantity;
        $livestock->save();

        return response()->json(['message' => 'Quantity updated successfully!']);
    }
}
