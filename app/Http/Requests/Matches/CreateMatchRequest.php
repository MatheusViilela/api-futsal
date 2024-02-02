<?php

namespace App\Http\Requests\Matches;

use App\Exceptions\Execptions;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateMatchRequest extends FormRequest
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
            'date' => [
                'required',
                'date',
            ],
            'start_match' => [
                'required',
                'date_format:H:i',
            ],
            'end_match' => [
                'required',
                'date_format:H:i',
            ],
            'team1_id' => [
                'required',
                'integer',
                'exists:teams,id'
            ],
            'team1_score' => [
                'integer',
            ],
            'team2_id' => [
                'required',
                'integer',
                'exists:teams,id'
            ],
            'team2_score' => [
                'integer',
            ],
            'winner_teams_id' => [
                'integer',
                'exists:teams,id'
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'date.required' => 'O campo date é obrigatório',
            'date.date' => 'O campo date deve ser uma data',
            'start_match.required' => 'O campo start_match é obrigatório',
            'start_match.date_format' => 'O campo start_match deve ser uma hora válida',
            'end_match.required' => 'O campo end_match é obrigatório',
            'end_match.date_format' => 'O campo end_match deve ser uma hora válida',
            'team1_id.required' => 'O campo team1_id é obrigatório',
            'team1_id.integer' => 'O campo team1_id deve ser um número inteiro',
            'team1_id.exists' => 'O campo team1_id deve ser um id válido',
            'team1_score.integer' => 'O campo team1_score deve ser um número inteiro',
            'team2_id.required' => 'O campo team2_id é obrigatório',
            'team2_id.integer' => 'O campo team2_id deve ser um número inteiro',
            'team2_id.exists' => 'O campo team2_id deve ser um id válido',
            'team2_score.integer' => 'O campo team2_score deve ser um número inteiro',
            'winner_teams_id.integer' => 'O campo winner_teams_id deve ser um número inteiro',
            'winner_teams_id.exists' => 'O campo winner_teams_id deve ser um id válido',
    
        ];
    }
    public function failedValidation(Validator $validator): void
    {
        throw new Execptions($validator->errors()->first());
    }
}
