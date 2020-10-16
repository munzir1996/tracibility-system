<?php

namespace App\Http\Requests;

use App\Import;
use Illuminate\Foundation\Http\FormRequest;

class ImportUpdateRequest extends FormRequest
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
            'import_amount' => $this->import->amount,
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
            'quantity' => 'required',
            'used' => 'required|lte:import_amount',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'verification_code.same' => 'رقم التحقق غير صحيح',
        ];
    }

}



