<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsumerStoreRequest extends FormRequest
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
            'name' => 'required',
            'national_id' => 'required|min:11|max:11|unique:consumers,national_id',
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
            'name.required' => 'الأسم مطلوب',
            'national_id.required' => 'الرقم الوطني مطلوب',
            'national_id.unique' => 'الرقم الوطني مستخدم',
            'national_id.min' => 'يجب أن يكون الرقم الوطني 11 أرقام',
            'national_id.max' => 'يجب أن يكون الرقم الوطني 11 أرقام',
        ];
    }

}



