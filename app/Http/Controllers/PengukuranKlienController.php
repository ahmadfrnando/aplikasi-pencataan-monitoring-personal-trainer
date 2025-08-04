<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengukuranKlienRequest;
use App\Models\Klien;
use App\Models\PengukuranKlien;
use Illuminate\Http\Request;

class PengukuranKlienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $klien = Klien::where('id', $id)->first();
        return view('pages.klien.pengukuran.create', compact('klien'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PengukuranKlienRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $validatedData['user_id'] = auth()->id();
            $pengukuranKlien = PengukuranKlien::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $pengukuranKlien
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
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
    public function update(Request $request)
    {
        $pengukuran = PengukuranKlien::find($request->id);  // Menemukan data berdasarkan ID
        if ($pengukuran) {
            $pengukuran->{$request->name} = $request->value; // Menyimpan perubahan
            $pengukuran->save();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $pengukuran,
                'no_urut_pengukuran' => $pengukuran->no_urut_pengukuran
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: '
        ], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
