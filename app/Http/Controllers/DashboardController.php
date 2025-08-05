<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\PengukuranKlien;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $stats = [
            'total_klien' => $this->getStats()['total_klien'],
            'total_klien_bulking' => $this->getStats()['total_klien_bulking'],
            'total_klien_cutting' => $this->getStats()['total_klien_cutting'],
        ];
        $dataPengukuranTerbaru = [
            'data' => $this->getPengukuranTerbaru(),
        ];
        $dataTableKlienTerbaru = [
            'data' => $this->getTableKlienTerbaru(),
        ];
        return view('pages.dashboard', compact('stats', 'dataPengukuranTerbaru', 'dataTableKlienTerbaru'));
    }

    private function getStats()
    {
        $data = Klien::selectRaw('count(*) as total_klien, count(is_mengurangi_fat) as total_klien_bulking, count(!is_mengurangi_fat) as total_klien_cutting')
            ->first()
            ->toArray();
        return [
            'total_klien' => $data['total_klien'],
            'total_klien_bulking' => $data['total_klien_bulking'],
            'total_klien_cutting' => $data['total_klien_cutting'],
        ];
    }

    private function getPengukuranTerbaru()
    {
        $data = PengukuranKlien::with('klien')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($pengukuran) {
                return [
                    'nama' => $pengukuran->klien->nama,
                    'jenis_kelamin' => $pengukuran->klien->jenis_kelamin,
                    'nama_program_latihan' => $pengukuran->klien->program_latihan_klien->last()->nama_program ?? 'Tidak ada program Latihan',
                    'waktu_terakhir' => $pengukuran->created_at->diffForHumans(),
                ];
            });
        return $data->toArray();
    }

    private function getTableKlienTerbaru()
    {
        $data = Klien::with('pengukuran')->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($klien) {
                if($klien->is_mengurangi_fat){
                    $persentase = round((($klien->pengukuran->first()->berat_badan - $klien->pengukuran->last()->berat_badan) / $klien->target_berat_badan) * 100, 2);
                } else {
                    $persentase = 0;
                    if ($klien->pengukuran->isNotEmpty() && $klien->pengukuran->first() && $klien->pengukuran->last()) {
                        $firstBerat = $klien->pengukuran->first()->berat_badan ?? 0;
                        $lastBerat = $klien->pengukuran->last()->berat_badan ?? 0;
                        if ($klien->target_berat_badan) {
                            $persentase = round((($lastBerat - $firstBerat) / $klien->target_berat_badan) * 100, 2);
                        }
                    }
                }
                return [
                    'nama' => $klien->nama,
                    'jenis_kelamin' => $klien->jenis_kelamin,
                    'target_berat_badan' => $klien->target_berat_badan ?? 0,
                    'berat_badan' => $klien->berat_badan ?? 0,
                    'persentase_pencapaian_terakhir' => $persentase ?? 0,
                ];
            });
        return $data->toArray();
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
