<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgramLatihanKlienRequest;
use App\Models\Klien;
use App\Models\ProgramLatihanInti;
use App\Models\ProgramLatihanKlien;
use App\Models\ProgramLatihanPendinginan;
use App\Models\ProgramPemanasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProgramLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Klien::select('*')->where('user_id', auth()->id())->orderBy('id', 'asc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('program-latihan-klien.show', $row->id) . '" class="ms-2 btn btn-outline-secondary">Detail</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.program-latihan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.program-latihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramLatihanKlienRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['user_id'] = auth()->id();
            $klien = ProgramLatihanKlien::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $klien
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
    public function show(Request $request, string $id)
    {   
        $klien = Klien::findOrfail($id);
        if ($request->ajax()) {
            $data = ProgramLatihanKlien::select('*')->where('klien_id', $id)->where('user_id', auth()->id());
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('program.pemanasan.index', $row->id) . '" class="ms-2 btn btn-outline-secondary">Detail</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.program-latihan.show', compact('klien'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = ProgramLatihanKlien::findOrFail($id);
        return view('pages.program-latihan.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramLatihanKlienRequest $request, string $id)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['user_id'] = auth()->id();
            $klien = ProgramLatihanKlien::update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $klien
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
        DB::beginTransaction();
        try {
            $program = ProgramLatihanKlien::findOrFail($id);

            if ($program->program_latihan_inti) {
                $program->program_latihan_inti->delete();
            }

            if ($program->program_latihan_pendinginan) {
                $program->program_latihan_pendinginan->delete();
            }

            if ($program->program_pemanasan) {
                $program->program_pemanasan->delete();
            }

            $program->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
