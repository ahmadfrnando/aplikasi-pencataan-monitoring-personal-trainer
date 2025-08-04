<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramLatihanPendinginanRequest;
use App\Models\ProgramLatihanKlien;
use App\Models\ProgramLatihanPendinginan;
use App\Models\ProgramPemanasan;
use Illuminate\Http\Request;

class ProgramLatihanPendinginanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id)
    {
        $program = ProgramLatihanKlien::findOrFail($id);
        return view('pages.program-latihan.pendinginan.index', compact('program'));
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
    public function store(ProgramLatihanPendinginanRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['user_id'] = auth()->id();
            $data = ProgramLatihanPendinginan::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $data
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
        $pemanasan = ProgramLatihanPendinginan::findOrFail($id);
        return response()->json($pemanasan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramLatihanPendinginanRequest $request, string $id)
    {   
        try {
            $pemanasan = ProgramLatihanPendinginan::findOrFail($id);
            $validatedData = $request->validated();
            $validatedData['user_id'] = auth()->id();
            $data = $pemanasan->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateIsDone(Request $request)
    {
        $id = $request->id;
        $is_done = $request->is_done;
        try {
            ProgramLatihanPendinginan::where('id', $id)->update([
                'is_done' => $is_done
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemanasan = ProgramLatihanPendinginan::findOrFail($id);
        $pemanasan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!',
        ], 200);
    }
}
