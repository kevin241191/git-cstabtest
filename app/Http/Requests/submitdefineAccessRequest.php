<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class submitdefineAccessRequest extends FormRequest
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
            'code' => 'required|exists:reset_code_passwords,code|min:4',
            'password' => [
                'required', 'string', 'same:confirm_password',
                Password::min(8)->letters()->numbers()->mixedCase()->symbols()
            ],           
            'confirm_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Le code est requis',
            'code.min' => 'Le code est sur 4 chiffres',
            'code.exists' => 'Ce code n\'est pas valide. Consultez votre boite mail',
            'password.same' => 'Les mots de passe ne correspondent pas',
            'confirm_password.same' => 'Les mots de passe ne correspondent pas',
        ];
    }
}
