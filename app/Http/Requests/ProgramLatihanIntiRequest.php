<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramLatihanIntiRequest extends FormRequest
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
            'program_latihan_id' => 'required|exists:program_latihan_klien,id',
            'target_otot' => 'required|string|max:255',
            'gerakan' => 'required|string|max:255',
            'alat' => 'required|string|max:255',
            'set' => 'required|string|max:255',
            'rep' => 'required|string|max:255',
            'rest' => 'required|string|max:255',
            'tempo' => 'required|string|max:255',
            'set_1' => 'nullable|string|max:255',
            'set_2' => 'nullable|string|max:255',
            'set_3' => 'nullable|string|max:255',
            'set_4' => 'nullable|string|max:255',
            'set_5' => 'nullable|string|max:255',
            'beban_1' => 'nullable|string|max:255',
            'beban_2' => 'nullable|string|max:255',
            'beban_3' => 'nullable|string|max:255',
            'beban_4' => 'nullable|string|max:255',
            'beban_5' => 'nullable|string|max:255',
            'catatan' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'program_latihan_id.required' => 'Program latihan wajib diisi.',
            'program_latihan_id.exists' => 'Program latihan tidak ditemukan.',
            'target_otot.required' => 'Target otot wajib diisi.',
            'gerakan.required' => 'Gerakan wajib diisi.',
            'alat.required' => 'Alat wajib diisi.',
            'set.required' => 'Set wajib diisi.',
            'rep.required' => 'Rep wajib diisi.',
            'rest.required' => 'Rest wajib diisi.',
            'tempo.required' => 'Tempo wajib diisi.',
            'set_1.required' => 'Set 1 wajib diisi.',
            'set_2.required' => 'Set 2 wajib diisi.',
            'set_3.required' => 'Set 3 wajib diisi.',
            'set_4.required' => 'Set 4 wajib diisi.',
            'set_5.required' => 'Set 5 wajib diisi.',
            'beban_1.required' => 'Beban 1 wajib diisi.',
            'beban_2.required' => 'Beban 2 wajib diisi.',
            'beban_3.required' => 'Beban 3 wajib diisi.',
            'beban_4.required' => 'Beban 4 wajib diisi.',
            'beban_5.required' => 'Beban 5 wajib diisi.',
        ];
    }
}
