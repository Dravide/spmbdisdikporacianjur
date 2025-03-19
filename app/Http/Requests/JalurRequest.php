<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JalurRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'kode' => 'required|max:3',
            'nama_jalur' => 'required',
            'svg' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode harus diisi.',
            'kode.max' => 'Kode maksimal 3 karakter.',
            'nama_jalur.required' => 'Nama Jalur harus diisi.',
            'svg.required' => 'SVG harus diisi.',
        ];
    }
}
