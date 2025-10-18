<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KlienRequest;
use App\Http\Requests\UserRequest;
use App\Models\Klien;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->orderBy('name', 'asc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('admin.trainer.edit', $row->id) . '" class="btn btn-sm btn-primary"><i class="ti ti-edit"></i></a>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" id="delete" class="ms-2 btn btn-sm btn-danger"><i class="ti ti-trash"></i></button>';
                    return $btn;
                })
                ->addColumn('jlh_klien', function ($row) {
                    return Klien::where('user_id', $row->id)->count() . ' Klien';
                })
                ->rawColumns(['action', 'jlh_klien'])
                ->make(true);
        }
        return view('pages.admin.trainer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['email_verified_at'] = now();
            $validatedData['password'] = bcrypt($validatedData['password']);
            $user = User::create($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan!',
                'data' => $user
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
        $trainer = User::find($id);
        return view('pages.admin.trainer.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $validatedData = $request->validated();
        try {
            $validatedData['email_verified_at'] = now();
            $validatedData['password'] = bcrypt($validatedData['password']);

            $user = User::findOrFail($id);
            $user->update($validatedData);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah!',
                'data' => $user
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
            $user = User::findOrFail($id);
            $user->delete();
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
