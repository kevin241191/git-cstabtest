<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateForm extends FormRequest
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
            'designation' => 'nullable',
            'raisonsociale' => 'nullable',
            'adresse' => 'nullable',
            'telephone' => 'nullable',
            'email' => 'nullable',
            'ifu' => 'nullable|min:13',
            'rccm' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'ifu.min' => 'Le numéro IFU du client doit contenir 13 chiffres',
        ];
    }
}
