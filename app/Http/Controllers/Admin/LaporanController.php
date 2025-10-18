<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klien;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Klien::select('*')->with('trainer')->orderBy('nama', 'asc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('laporan.cetak-pengukuran', $row->id) . '" id="cetakLaporan" class="btn btn-outline-primary" target="_blank"><i class="ti ti-file-chart"></i> Cetak Pengukuran</a>';
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
        return view('pages.admin.laporan.index');
    }

    public function cetakPengukuran(string $id)
    {
        $data = Klien::with('program_latihan_klien')->with('trainer')->where('id', $id)->get();
        $pdf = Pdf::loadView('pages.admin.laporan.cetak-pengukuran-pdf', compact('data'));
        return $pdf->stream('cetak_laporan_klien_pengukuran.pdf');
    }
    public function cetakProgramLatihan(string $id)
    {
        $data = Klien::with('program_latihan_klien')->with('trainer')->where('id', $id)->get();
        $pdf = Pdf::loadView('pages.admin.laporan.cetak-program-latihan-pdf', compact('data'));
        return $pdf->stream('cetak_laporan_klien_program_latihan.pdf');
    }
}
