<?php

namespace Modules\ProductWithUnit\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductWithUnitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'required',
            'price' => 'required',

        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Kötelező a termék nevét megadni',
            'price.required' => 'Kötelező a termék árát megadni',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
