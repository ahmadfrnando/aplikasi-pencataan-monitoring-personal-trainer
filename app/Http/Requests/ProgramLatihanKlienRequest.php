<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramLatihanKlienRequest extends FormRequest
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
        $return = [
            'klien_id' => 'required|exists:klien,id',
            'nama_program' => 'required|string',
            'durasi_menit' => 'required|integer',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ];

        if ($this->isMethod('put')) {
            $return['klien_id'] = 'nullable|exists:klien,id';
        }

        return $return;
    }

    public function messages()
    {
        return [
            'klien_id.required' => 'Klien harus dipilih.',
            'klien_id.exists' => 'Klien tidak ditemukan.',
            'nama_program.required' => 'Nama program harus diisi.',
            'durasi_menit.required' => 'Durasi menit harus diisi.',
            'durasi_menit.integer' => 'Durasi menit harus berupa angka.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'tanggal.date' => 'Tanggal harus berupa tanggal.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];
    }
}
