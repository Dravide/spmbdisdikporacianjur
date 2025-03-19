<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SekolahRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->method() == 'POST') {
            $npsn = 'required|integer|unique:sekolahs,npsn';
            $img = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $password = 'required';
            $confirm_password = 'required|same:password';
        } elseif ($this->method() == 'PUT') {
            $npsn = 'required|integer|unique:sekolahs,npsn,' . $this->sekolah->id;
            $img = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
            $password = 'sometimes';
            if ($this->password != null) {
                $confirm_password = 'required|same:password';
            } else {
                $confirm_password = 'sometimes|same:password';
            }

        }
        return [
            'npsn' => $npsn,
            'img' => $img,
            'nama_sekolah' => ['required'],
            'email' => 'required|email',
            'lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9]).(\d+))|(90(.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9])).(\d+))|180(.0+)?)$/'],
            'lon' => ['required', 'regex:/^[-]?(([0-8]?[0-9]).(\d+))|(90(.0+)?),[-]?((((1[0-7][0-9])|([0-9]?[0-9])).(\d+))|180(.0+)?)$/'],
            'password' => $password,
            'confirm_password' => $confirm_password,
            'operator' => ['required'],
            'no_hp' => ['required'],
            'alamat' => ['required'],
            'pengumuman' => ['sometimes'],
            'propagasi' => ['sometimes'],
        ];
    }

    public function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
