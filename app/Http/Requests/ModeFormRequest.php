<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeFormRequest extends FormRequest
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
            'lib_mode' => 'required|unique:modes,lib_mode'
        ];
    }

    public function messages()
    {
        return [
            'lib_mode.required' => 'Le mode de paiement est requis',
            'lib_mode.unique' => 'Ce mode existe déja'
        ];
    }
}
