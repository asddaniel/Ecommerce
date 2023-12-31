<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduitRequest extends FormRequest
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
            "name"=>["required", "string", "max:99"],
            "price"=>["required", "numeric", "min:0"],
            "image"=>["image", "mimes:jpg,png,jpeg"],
            "description"=>["required", "string"],
            "quantity"=>["integer"],
            'categorie_id'=>["integer"],
            "user_id"=>["integer"]
        ];
    }
}
