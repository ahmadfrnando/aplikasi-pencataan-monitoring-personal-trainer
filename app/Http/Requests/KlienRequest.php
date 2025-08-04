<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KlienRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'usia' => 'required|integer',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'target_berat_badan' => 'required|numeric',
            'riwayat_cedera' => 'nullable|string',
            'pekerjaan' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi.',
            'usia.required' => 'Usia harus diisi.',
            'berat_badan.required' => 'Berat badan harus diisi.',
            'tinggi_badan.required' => 'Tinggi badan harus diisi.',
            'target_berat_badan.required' => 'Target berat badan harus diisi.',
            'riwayat_cedera.required' => 'Riwayat cedera harus diisi.',
            'pekerjaan.required' => 'Pekerjaan harus diisi.',
        ];
    }
}
