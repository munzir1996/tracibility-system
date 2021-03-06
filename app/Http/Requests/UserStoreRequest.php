<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'national_id' => 'required|min:11|max:11|unique:users,national_id',
            'phone' => 'required|min:10|max:10',
            'password' => 'required|min:8|confirmed',
            'permission' => 'required',
            'organization_id' => 'required_unless:permission,super-admin',
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
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.min' => 'يجب أن يكون رقم الهاتف 10 أرقام',
            'phone.max' => 'يجب أن يكون رقم الهاتف 10 أرقام',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'يجب أن لا تقل كلمة المرور عن 8 خانات',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
            'permission.required' => 'الصلاحية مطلوبة',
            'organization_id.required_unless' => 'يجب أختيار الجهة',
        ];
    }

}

