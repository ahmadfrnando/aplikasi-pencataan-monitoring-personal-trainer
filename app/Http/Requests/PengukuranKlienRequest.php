<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengukuranKlienRequest extends FormRequest
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
            'klien_id' => 'required|exists:klien,id',
            'no_urut_pengukuran' => 'required|numeric',
            'tanggal' => 'required|date',
            'berat_badan' => 'required|numeric',
            'weist_circumference' => 'required|numeric',
            'body_fat' => 'required|numeric',
            'visceral_fat' => 'required|numeric',
            'bmi' => 'required|numeric',
            'body_age' => 'required|numeric',
            'leher' => 'required|numeric',
            'dada' => 'required|numeric',
            'panggul' => 'required|numeric',
            'paha_kiri' => 'required|numeric',
            'paha_kanan' => 'required|numeric',
            'betis_kiri' => 'required|numeric',
            'betis_kanan' => 'required|numeric',
            'fat_whole_body' => 'required|numeric',
            'fat_trunk' => 'required|numeric',
            'fat_arm' => 'required|numeric',
            'fat_leg' => 'required|numeric',
            'muscle_whole_body' => 'required|numeric',
            'muscle_trunk' => 'required|numeric',
            'muscle_arm' => 'required|numeric',
            'muscle_leg' => 'required|numeric',
            'perut' => 'required|numeric',
            'pinggang' => 'required|numeric',
            'lengan_kanan_atas' => 'required|numeric',
            'lengan_kanan_bawah' => 'required|numeric',
            'lengan_kiri_atas' => 'required|numeric',
            'lengan_kiri_bawah' => 'required|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi.',
            'numeric' => ':attribute harus berupa angka.',
            'date' => ':attribute harus berupa tanggal.',
        ];
    }
}
