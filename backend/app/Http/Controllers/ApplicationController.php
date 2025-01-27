<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return response()->json(Application::with('livestock', 'user')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'livestock_id' => 'required|exists:livestock,id',
            'quantity_requested' => 'required|integer|min:1',
        ]);

        $application = Application::create([
            'user_id' => auth()->id(),
            'livestock_id' => $request->livestock_id,
            'quantity_requested' => $request->quantity_requested,
            'status' => 'Pending',
        ]);

        return response()->json(['message' => 'Application submitted successfully', 'data' => $application]);
    }
}
