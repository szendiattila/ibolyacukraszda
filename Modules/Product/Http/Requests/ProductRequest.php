<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'description' => 'required',
            'image' => 'required|image',
            '_10pcs_price' => 'required',
            '_20pcs_price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kötelező a termék nevét megadni',
            'description.required' => 'Kötelező a termék leírást megadni',
            'image.required' => 'Kötelező a termék képet megadni',
            'image.image' => 'Kötelező a termék képet megadni',
            '_10pcs_price.required' => 'Kötelező a 10 szeletes termék árát megadni',
            '_20pcs_price.required' => 'Kötelező a 20 szeletes termék árát megadni',
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
