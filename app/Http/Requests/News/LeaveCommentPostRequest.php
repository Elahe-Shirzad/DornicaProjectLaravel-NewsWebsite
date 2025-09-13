<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class LeaveCommentPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'nullable',
                'persian_alpha',
                'max:64'
            ],
            'email' => [
                'nullable',
                'email',
                'max:64'
            ],
            'content' => [
                'required',
                'string',
                'min:2',
                'max:512'
            ],
            'user_id' => [
                'nullable',
                'exists:App\Models\User,id'
            ],
            'admin_id' => [
                'nullable',
                'exists:App\Models\Admin,id'
            ],
        ];
    }
}
