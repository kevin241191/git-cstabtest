<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientFormRequest extends FormRequest
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
            'designation' => 'required',
           // 'raisonsociale' => 'uppercase',
            'adresse' => 'required',
            'telephone' => 'required|unique:clients,telephone|min:13',
            'email' => 'required|unique:clients,email',
            'ifu' => 'unique:clients,ifu|min:13',
            //'rccm' => 'string'
        ]; 
    }

    public function messages()
    {
        return [
            'designation.required' => 'Le nom du client est requis est requis',  
           // 'raisonsociale.uppercase' => 'La raison sociale du client doit être en majuscules', 
            'adresse.required' => 'L\'adresse est requis est requis', 
            'telephone.required' => 'Le téléphone est requis est requis',            
            'telephone.unique' => 'Le numéro de téléphone est unique pour chaque client',
            'telephone.min' => 'Le numéro de téléphone doit contenir au moins 14 caractères',
            'email.required' => 'Le mail est requis est requis', 
            'email.unique' => 'Le mail est existe déjà',
            'ifu.unique' => 'Le numéro IFU est unique pour chaque client', 
            'ifu.min' => 'Le numéro IFU doit contenir au minimum 13 caractères',  
            //'rccm.string' => 'La raison sociale du client doit être une chaîne de caractères'  
        ];
    }
}
