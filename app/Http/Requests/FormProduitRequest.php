<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProduitRequest extends FormRequest
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
            'image' => 'required',
            'reference' => 'required',
            'nomprod' => 'required',
            'qte' => 'required',
            'prix_achat' => 'required',
            'modele' => 'required',
            'codebarre' => 'required',
            'groupe_id' => 'required',
            'categorie_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'L\'image est obligatoire',
            'reference.required' => 'La reference est obligatoire',
            'nomprod.required' => 'Le nom du produit est obligatoire',
            'qte.required' => 'La quantite est obligatoire',
            'prix_achat.required' => 'Le prix d\'achat est obligatoire',
            'modele.required' => 'Le modele est obligatoire',
            'codebarre.required' => 'Le codebarre est obligatoire',
            'groupe_id.required' => 'Le groupe est obligatoire',
            'categorie_id.required' => 'La categorie est obligatoire',
        ];
    }
}
