<?php

namespace App\Http\Requests\Matches;

use App\Exceptions\Execptions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMatchRequest extends FormRequest
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
                'exists:matches,id'
            ],
            'date' => [
                'date',
            ],
            'start_match' => [
                'date_format:H:i',
            ],
            'end_match' => [
                'date_format:H:i',
            ],
            'team1_id' => [
                'integer',
                'exists:teams,id'
            ],
            'team1_goals' => [
                'required',
                'integer',
            ],
            'team2_id' => [
                'integer',
                'exists:teams,id'
            ],
            'team2_goals' => [
                'required',
                'integer',
            ],
            'winner_teams_id' => [
                'integer',
                'exists:teams,id'
            ],
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'O campo id é obrigatório',
            'id.integer' => 'O campo id deve ser um número inteiro',
            'id.exists' => 'O campo id deve ser um id válido',
            'date.date' => 'O campo date deve ser uma data válida',
            'start_match.date_format' => 'O campo start_match deve ser uma hora válida',
            'end_match.date_format' => 'O campo end_match deve ser uma hora válida',
            'team1_id.integer' => 'O campo team1_id deve ser um número inteiro',
            'team1_id.exists' => 'O campo team1_id deve ser um id válido',
            'team1_goals.required' => 'O campo team1_goals é obrigatório',
            'team1_goals.integer' => 'O campo team1_goals deve ser um número inteiro',
            'team2_id.integer' => 'O campo team2_id deve ser um número inteiro',
            'team2_id.exists' => 'O campo team2_id deve ser um id válido',
            'team2_goals.required' => 'O campo team2_goals é obrigatório',
            'team2_goals.integer' => 'O campo team2_goals deve ser um número inteiro',
            'winner_teams_id.integer' => 'O campo winner_teams_id deve ser um número inteiro',
            'winner_teams_id.exists' => 'O campo winner_teams_id deve ser um id válido',
        ];
    }
    public function failedValidation(Validator $validator): void
    {
        throw new Execptions($validator->errors()->first());
    }
}
