<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramPemanasanRequest extends FormRequest
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
        $rules =  [
            'program_latihan_id' => 'required|exists:program_latihan_klien,id',
            'target' => 'required|string',
            'gerakan' => 'required|string',
            'catatan' => 'nullable|string',
        ];

        if ($this->isMethod('put')) {
            $rules['program_latihan_id'] = 'nullable|exists:program_latihan_klien,id'; // Membuatnya nullable saat update
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'program_latihan_id.required' => 'Program Latihan Klien harus dipilih.',
            'program_latihan_id.exists' => 'Program Latihan Klien tidak ditemukan.',
            'target.required' => 'Target harus diisi.',
            'gerakan.required' => 'Gerakan harus diisi.',
        ];
    }
}
