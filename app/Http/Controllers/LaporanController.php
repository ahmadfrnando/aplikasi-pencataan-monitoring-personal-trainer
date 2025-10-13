<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Klien::select('*')->where('user_id', auth()->id())->orderBy('nama', 'asc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('laporan.cetak-pengukuran', $row->id) . '" id="cetakLaporan" class="btn btn-outline-primary" target="_blank"><i class="ti ti-file-chart"></i> Cetak Pengukuran</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.laporan.index');
    }

    public function cetakPengukuran(string $id)
    {   
        $data = Klien::with('program_latihan_klien')->where('user_id', auth()->id())->where('id', $id)->get();
        $pdf = Pdf::loadView('pages.laporan.cetak-pengukuran-pdf', compact('data'));
        return $pdf->stream('cetak_laporan_klien_pengukuran.pdf');
    }
    public function cetakProgramLatihan(string $id)
    {   
        $data = Klien::with('program_latihan_klien')->where('user_id', auth()->id())->where('id', $id)->get();
        $pdf = Pdf::loadView('pages.laporan.cetak-program-latihan-pdf', compact('data'));
        return $pdf->stream('cetak_laporan_klien_program_latihan.pdf');
    }
}
