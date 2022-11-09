<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enum\TypeProductEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'sometimes|required',
            'type' => ['required',
                        Rule::in([
                            TypeProductEnum::ELECTRONICS,
                            TypeProductEnum::EDIBLES,
                            TypeProductEnum::BATH_AND_BED,
                            TypeProductEnum::CELL_PHONES,
                        ]),
            ],
            'name' => 'required|min:3|max:25',
            'description' => 'required|min:10|max:250',
            'photograph' => 'mimes:jpeg,png,jpg',
            'price' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Campo obrigatório!',
            'name.max' => 'No maximo 25 caracteres!',
            'name.min' => 'No minimo 3 caracteres!',
            'description.max' => 'No maximo 250 caracteres!',
            'description.min' => 'No min 10 caracteres!',
            'photograph.mimes' => 'A foto tem que ser do tipo jpeg, png ou jpg',
        ];
    }
}
