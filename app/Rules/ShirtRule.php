<?php

namespace App\Rules;

use App\Models\Players;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ShirtRule implements ValidationRule
{
    private $team_id;

    public function __construct($team_id)
    {
        $this->team_id = $team_id;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $player = Players::where('teams_id', $this->team_id)->where('shirt_number', $value)->first();
        if ($player) $fail("Já existe um jogador com a camisa $value nesse time.");
    }
}
