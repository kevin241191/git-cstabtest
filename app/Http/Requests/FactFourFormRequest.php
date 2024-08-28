<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactFourFormRequest extends FormRequest
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
            'reference' => 'required|string',
            'reception_id' => 'required',
            'echeance' => 'required',
            'montantcommande' => 'required',
            'montantlivraison' => 'required'            
        ];
    }

    public function messages()
    {
        return [
            'reference.required' => 'La reference est requise',
            'reception_id.required' => 'La reception est requise',
            'echeance.required' => 'L\'echeance est requise',
            'montantcommande.required' => 'Le montant commande est requise',
            'montantlivraison.required' => 'Le montant livraison est requise'
        ];
    }
}
