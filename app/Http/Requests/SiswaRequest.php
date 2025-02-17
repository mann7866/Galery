<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nama'=>'nullable|min:5',
            // 'jurusan'=>'nullable',
            'image' => 'nullable|mimes:png,jpg',
        //    'jurusans' => 'nullable|array', // Memastikan 'jurusans' adalah array
        //     'jurusans.*' => 'exists:jurusans,id',
        ];
    }
    public function messages(): array
    {
        return [
            'nama.reuired'=>'nama tidak boleh kosong',
            'nama.min'=>'nama min 5',
        ];
    }
}
