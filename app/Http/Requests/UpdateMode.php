<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMode extends FormRequest
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
            'lib_mode' =>'string|nullable'
        ];
    }

    public function messages()
    {
        return [
            'lib_mode.string' => 'Le nom de la catégorie doit être une chaîne de caractères',
        ];
    }
}
