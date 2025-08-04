<?php

namespace App\Http\Controllers;

use App\Charts\Monitoring\KomposisiTubuhChart;
use App\Models\Klien;
use App\Models\ProgramLatihanKlien;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Klien::select('*')->where('user_id', auth()->id())->orderBy('nama', 'asc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('monitoring.show', $row->id) . '" class="ms-2 btn btn-outline-secondary">Detail</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.monitoring.index');
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
    public function show(KomposisiTubuhChart $chart, string $id)
    {
        $klien = Klien::findOrFail($id);
        $chart = $chart->build($id);
        return view('pages.monitoring.show', compact('klien', 'chart'));
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
