<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $stats = [
            'total_klien' => \App\Models\Klien::count(),
            'total_klien_bulking' => \App\Models\Klien::where('is_mengurangi_fat', false)->count(),
            'total_klien_cutting' => \App\Models\Klien::where('is_mengurangi_fat', true)->count(),
        ];
        
        $trainer = User::where('is_admin', '!=', 1)->get();

        return view('pages.admin.dashboard.index', compact('stats', 'trainer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
