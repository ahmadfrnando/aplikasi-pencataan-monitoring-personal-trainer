<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\PengukuranKlien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $klien;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->klien = Klien::where('user_id', Auth::id());
            return $next($request);
        });
    }
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
        $data = $this->klien->selectRaw('count(*) as total_klien, count(CASE WHEN is_mengurangi_fat = 0 THEN 1 END) as total_klien_bulking, count(CASE WHEN is_mengurangi_fat = 1 THEN 1 END) as total_klien_cutting')
            ->first()
            ->toArray();
        return [
            'total_klien' => (int)$data['total_klien'],
            'total_klien_bulking' => (int)$data['total_klien_bulking'],
            'total_klien_cutting' => (int)$data['total_klien_cutting'],
        ];
    }

    private function getPengukuranTerbaru()
    {
        $data = Klien::where('user_id', Auth::id())
            ->with(['pengukuran', 'program_latihan_klien'])
            ->get()
            ->flatMap(function ($klien) {
                return $klien->pengukuran
                    ->sortByDesc('created_at')
                    ->take(5)
                    ->map(function ($pengukuran) use ($klien) {
                        return [
                            'nama' => $klien->nama,
                            'jenis_kelamin' => $klien->jenis_kelamin,
                            'nama_program_latihan' => $klien->program_latihan_klien->last()->nama_program ?? 'Tidak ada program Latihan',
                            'waktu_terakhir' => $pengukuran->created_at->diffForHumans(),
                        ];
                    });
            })
            ->values();

        return $data->toArray();
    }

    // private function getTableKlienTerbaru()
    // {
    //     $data = $this->klien->with('pengukuran')->orderBy('created_at', 'desc')
    //         ->take(5)
    //         ->get()
    //         ->map(function ($klien) {
    //             if ($klien->is_mengurangi_fat) {
    //                 $persentase = round((($klien->pengukuran->first()->berat_badan - $klien->pengukuran->last()->berat_badan) / $klien->target_berat_badan) * 100, 2);
    //             } else {
    //                 $persentase = 0;
    //                 if ($klien->pengukuran->isNotEmpty() && $klien->pengukuran->first() && $klien->pengukuran->last()) {
    //                     $firstBerat = $klien->pengukuran->first()->berat_badan ?? 0;
    //                     $lastBerat = $klien->pengukuran->last()->berat_badan ?? 0;
    //                     if ($klien->target_berat_badan) {
    //                         $persentase = round((($lastBerat - $firstBerat) / $klien->target_berat_badan) * 100, 2);
    //                     }
    //                 }
    //             }
    //             return [
    //                 'nama' => $klien->nama,
    //                 'jenis_kelamin' => $klien->jenis_kelamin,
    //                 'target_berat_badan' => $klien->target_berat_badan ?? 0,
    //                 'berat_badan' => $klien->berat_badan ?? 0,
    //                 'persentase_pencapaian_terakhir' => $persentase ?? 0,
    //             ];
    //         });
    //     return $data->toArray();
    // }

    private function getTableKlienTerbaru()
    {
        $data = Klien::where('user_id', Auth::id())
            ->with('pengukuran')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get()
            ->map(function ($klien) {
                $persentase = 0;

                if ($klien->pengukuran->isNotEmpty() && $klien->target_berat_badan) {
                    $firstBerat = $klien->pengukuran->first()->berat_badan ?? 0;
                    $lastBerat  = $klien->pengukuran->last()->berat_badan ?? 0;

                    if ($klien->is_mengurangi_fat) {
                        // cutting
                        $persentase = round((($firstBerat - $lastBerat) / $klien->target_berat_badan) * 100, 2);
                    } else {
                        // bulking
                        $persentase = round((($lastBerat - $firstBerat) / $klien->target_berat_badan) * 100, 2);
                    }
                }

                return [
                    'nama' => $klien->nama,
                    'jenis_kelamin' => $klien->jenis_kelamin,
                    'target_berat_badan' => $klien->target_berat_badan ?? 0,
                    'berat_badan' => $klien->berat_badan ?? 0,
                    'persentase_pencapaian_terakhir' => $persentase,
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
