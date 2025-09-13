<?php

namespace App\Http\Requests\Auth;

use App\Enums\GenderStatus;
use App\Enums\MilitaryServiceStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    protected function prepareForValidation()
    {
        // اگر جنسیت زن است، مقدار نظام وظیفه را null کن
        if ($this->gender != GenderStatus::MALE->value) {
            $this->merge([
                'military_service_status' => null
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [


            'first_name'=>[
                'required',
                'persian_alpha',
                'min:2',
                'max:60'

            ],
            'last_name'=>[
                'required',
                'persian_alpha',
                'min:2',
                'max:60'
            ],
            'national_code'=>[
                'required',
                'ir_national_id',
                'min:2',
                'max:60'
            ],
            'gender'=>[
                'required',
                'in:' . convertEnumCasesToString(GenderStatus::class)
            ],
            'mobile'=>[
                'required',
                'ir_mobile:zero',
            ],
            'email'=>[
                'required',
                'email',
                'unique:App\Models\User,email'
            ],
            'password'=>[
                'required',
                'min:6',
                'max:100',
                'confirmed'
            ],
            'username'=>[
                'required',
                'min:6',
                'max:100',
                'unique:App\Models\User,username'
            ],
            'military_service_status'=>[
                'nullable',
                'required_if:gender,' . GenderStatus::MALE->value,
                'in:' . convertEnumCasesToString(MilitaryServiceStatus::class)
            ]
        ];
    }

    public function attributes()
    {
        return[
            'military_service_status'=>'وضعیت نظام وظیفه',
            'national_code'=>'کدملی'
        ];

    }
}
