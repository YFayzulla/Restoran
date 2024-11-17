<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'phone' => ['required', 'string', 'digits:9', 'unique:users,phone'],
        ];
    }

    public function messages(): array

    {
        return [
            'phone.unique' => 'Telefon raqam allaqachon mavjud',
            'phone.digits' => 'Telefon raqam 9 xonaliy son bo`lish shart',
        ];
    }
}
