<?php

namespace App\Http\Requests\Team;

use App\Exceptions\Execptions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateTeamRequest extends FormRequest
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
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O campo name é obrigatório',
            'name.string' => 'O campo name deve ser uma string',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new Execptions($validator->errors()->first());
    }
}
