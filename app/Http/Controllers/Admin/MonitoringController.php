<?php

namespace App\Http\Controllers\Admin;

use App\Charts\Monitoring\KomposisiTubuhChart;
use App\Http\Controllers\Controller;
use App\Models\Klien;
use App\Models\PengukuranKlien;
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
            $data = Klien::select('*')->with('trainer')->orderBy('nama', 'asc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('admin.monitoring.show', $row->id) . '" class="ms-2 btn btn-outline-secondary">Detail</a>';
                    return $btn;
                })
                ->addColumn('nama_pt', function ($row) {
                    return $row->trainer->name ?? '-';
                })
                ->rawColumns(['action', 'nama_pt'])
                ->filterColumn('nama_pt', function ($query, $value) {
                    $query->whereHas('trainer', function ($q) use ($value) {
                        $q->where('name', 'LIKE', '%' . $value . '%');
                    });
                })
                ->make(true);
        }
        return view('pages.admin.monitoring.index');
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
        $klien = $this->getKlien($id);
        $chart = $chart->build($id);
        $latestMeasurement = $klien->pengukuran->sortByDesc('tanggal')->first();
        $stats = [
            'berat_badan_terakhir' => $latestMeasurement->berat_badan ?? 0,
            'persentase_lemak_tubuh_terakhir' => $latestMeasurement->body_fat ?? 0,
            'massa_otot_skeletal_terakhir' => $latestMeasurement->muscle_whole_body ?? 0,
        ];

        return view('pages.admin.monitoring.show', compact('klien', 'chart', 'stats'));
    }

    private function getKlien($klien_id)
    {
        $klien = Klien::findOrFail($klien_id);
        if (!$klien) {
            abort(404, 'Klien not found');
        }
        return $klien;
    }

    public function getRiwayatPengukuran(Request $request, string $klien_id)
    {
        if ($request->ajax()) {
            $data = PengukuranKlien::select('*')->where('klien_id', $klien_id)->orderBy('tanggal', 'asc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
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
