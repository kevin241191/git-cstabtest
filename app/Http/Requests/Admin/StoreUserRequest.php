<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'fname' =>'required|string|uppercase',
            'lname' =>'required|string',
            'email' =>'required|string|email|unique:users',
            'phone' =>'required|string|unique:users',
            'role' =>'required|string', 
        ];
    }

    public function messages(): array
    {
        return [
            'fname.required' => 'Le nom de l\'utilisateur est obligatoire',
            'fname.uppercase' => 'Le nom de l\'utilisateur doivent être en majuscules',
            'lname.required' => 'Le prénoms de l\'utilisateur est obligatoire',
            'email.required' => 'L\'email de l\'utilisateur est obligatoire',
            'email.email' => 'L\'email de l\'utilisateur doit être une adresse email valide',
            'email.unique' => 'Cette adresse email est déja utilisée',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé',
            'phone.required' => 'Le numéro de téléphone de l\'utilisateur est obligatoire',
            'role.required' => 'Le role de l\'utilisateur est requis',
        ];
    }
}
