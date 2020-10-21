<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellingQrcodeSellRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'produced' => $this->cteReceiving->what->produced,
        ]);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'consumed' => 'required|lte:produced'
        ];
    }
}
