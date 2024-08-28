<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegFourFormRequest extends FormRequest
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
            'reference' => 'required',
            'facture_fournisseur_id' => 'required',
            'mode_id' => 'required',
            'montantpaie' => 'required',
            // 'resteapayer' => 'required',
            'resteavant' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'reference.required' => 'La reference est obligatoire',
            'facture_fournisseur_id.required' => 'La facture est obligatoire',
            'mode_id.required' => 'Le mode de paiement est obligatoire',
            'montantpaie.required' => 'Le montant est obligatoire',
            // 'resteapayer.required' => 'Le reste à payer est obligatoire',
            'resteavant.required' => 'Le reste est obligatoire'
        ];
    }
}
