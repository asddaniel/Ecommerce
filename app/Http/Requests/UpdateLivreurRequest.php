<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLivreurRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'prix_par_kilo'=>['required', 'numeric'],
            'prix_par_valeur'=>['required', 'numeric'],
            'prix_par_distance'=>['required', 'numeric'],
            'delais'=>['required', 'integer']
        ];
    }
}
