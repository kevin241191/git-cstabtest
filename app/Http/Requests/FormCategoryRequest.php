<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCategoryRequest extends FormRequest
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
            'nomcat' => 'required|unique:categories,nomcat'.$this->category
        ];
    }

    public function messages()
    {
        return [
            'nomcat.required' => 'Le nom de la catégorie est requis',
            'nomcat.unique' => 'Le nom de la catégorie existe déjà'
        ];
    }
}
