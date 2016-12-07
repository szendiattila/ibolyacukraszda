<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'product' => 'required',
            'pType' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Kérem adja meg az email címét!',
            'name.required' => 'Kérem adja meg a nevét!',
            'quantity.required' => 'Kérem adja meg a mennyiséget!',
            'product.required' => 'Kérem adja meg a terméket!',
            'pType.required' => 'Hiányzó termék típus!',
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
