<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|max:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'email.unique' => 'Email should be unique.',
            'password.required' => 'Password field is required.',
            'password.max' => 'Password length should not be more then 8 character.'
        ];
    }
}
