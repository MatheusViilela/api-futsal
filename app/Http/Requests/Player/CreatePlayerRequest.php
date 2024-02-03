<?php

namespace App\Http\Requests\Player;

use App\Exceptions\Execptions;
use App\Rules\ShirtRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreatePlayerRequest extends FormRequest
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
            'shirt_number' => [
                'required',
                'integer',
                new ShirtRule($this->teams_id)
            ],
            'teams_id' => [
                'required',
                'integer',
                'exists:teams,id'
            ],
            //
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'O campo name é obrigatório',
            'name.string' => 'O campo name deve ser uma string',
            'shirt_number.required' => 'O campo shirt_number é obrigatório',
            'shirt_number.integer' => 'O campo shirt_number deve ser um número inteiro',
            'teams_id.required' => 'O campo teams_id é obrigatório',
            'teams_id.integer' => 'O campo teams_id deve ser um número inteiro',
            'teams_id.exists' => 'O campo teams_id deve ser um id válido',
        ];
    }
    public function failedValidation(Validator $validator): void
    {
        throw new Execptions($validator->errors()->first());
    }
}
