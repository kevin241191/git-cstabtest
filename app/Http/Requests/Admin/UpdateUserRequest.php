<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'lname' =>'required|string|max:255',
            'email' =>'required|string|email|unique:users,email,'. $this->user,
            'phone' =>'required|string|unique:users,phone,'. $this->user,
            'role' =>'required|string',
        ];
    }

    public function messages()
    {
        return [
            'fname.required' => 'Le nom est requis',
            'fname.uppercase' => 'Le nom doit être en majuscules',
            'lname.required' => 'Le prénoms est requis',
            'email.required' => 'L\'email est requis',
            'phone.required' => 'Le numéro de téléphone est requis',
            'role.required' => 'Le role est requis',
        ];
    }
}
