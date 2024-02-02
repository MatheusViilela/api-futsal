<?php

namespace App\Http\Requests\User;

use App\Exceptions\Execptions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
            ],
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo name é obrigatório',
            'name.string' => 'O campo name deve ser uma string',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'email.unique' => 'O campo email já está em uso',
            'password.required' => 'O campo password é obrigatório',
            'password.min' => 'O campo password deve ter no mínimo 8 caracteres',
        ];
    }
    public function failedValidation(Validator $validator): void
    {
        throw new Execptions($validator->errors()->first());
    }
}
