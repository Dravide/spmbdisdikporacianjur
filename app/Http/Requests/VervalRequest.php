<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VervalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id_pendaftar' => ['required', 'integer'],
            'id_berkas' => ['required', 'integer'],
            'data_berkas' => ['required'],
            'status' => ['required'],
        ];
    }
}
