<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramLatihanIntiRequest;
use App\Models\ProgramLatihanInti;
use App\Models\ProgramLatihanKlien;
use App\Models\ProgramPemanasan;
use Illuminate\Http\Request;

class ProgramLatihanIntiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id)
    {
        $program = ProgramLatihanKlien::findOrFail($id);
        return view('pages.program-latihan.latihan-inti.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {   
        $program = ProgramLatihanKlien::findOrFail($id);
        return view('pages.program-latihan.latihan-inti.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramLatihanIntiRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['user_id'] = auth()->id();
            $data = ProgramLatihanInti::create($validatedData);
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
        $pemanasan = ProgramLatihanInti::findOrFail($id);
        return response()->json($pemanasan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramLatihanIntiRequest $request, string $id)
    {   
        $pemanasan = ProgramLatihanInti::findOrFail($id);
        $validatedData = $request->validated();
        try {
            // $validatedData['is_done'] = $pemanasan->is_done;
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
            ProgramLatihanInti::where('id', $id)->update([
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
        $pemanasan = ProgramLatihanInti::findOrFail($id);
        $pemanasan->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!',
        ], 200);
    }
}
