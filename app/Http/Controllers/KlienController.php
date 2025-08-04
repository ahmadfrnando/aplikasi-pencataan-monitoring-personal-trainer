<?php

namespace App\Http\Controllers;

use App\Http\Requests\KlienRequest;
use App\Models\Klien;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Klien::select('*')->where('user_id', auth()->id());
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('klien.edit', $row->id) . '" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i></a>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" id="delete" class="ms-2 btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>';
                    $btn .= '<a href="' . route('klien.show', $row->id) . '" class="ms-2 btn btn-sm btn-outline-secondary">Detail</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.klien.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.klien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KlienRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['user_id'] = auth()->id();
            $klien = Klien::create($validatedData);
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
    public function show(string $id)
    {
        $klien = Klien::findOrfail($id);
        return view('pages.klien.show', compact('klien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $klien = Klien::find($id);
        return view('pages.klien.edit', compact('klien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KlienRequest $request, string $id)
    {
        $validatedData = $request->validated();
        try {
            $klien = Klien::findOrFail($id);
            $klien->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah!',
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
        try {
            $klien = Klien::findOrFail($id);
            $klien->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
