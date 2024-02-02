<?php

namespace App\Http\Requests\Team;

use App\Exceptions\Execptions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class DeleteTeamRequest extends FormRequest
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
            'id' => [
                'required',
                'integer',
                'exists:teams,id'
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'id.required' => 'O campo id é obrigatório',
            'id.integer' => 'O campo id deve ser um número inteiro',
            'id.exists' => 'O campo id deve ser um id válido',
        ];
    }
    public function failedValidation(Validator $validator): void
    {
        throw new Execptions($validator->errors()->first());
    }
}
