<?php

namespace App\Rules;

use App\Models\Teams;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MatchRule implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $team = Teams::find($value)->players->count() >= 5;
        if (!$team) $fail("Cada time deve ter no mininmo 5 jogadores para criar uma partida.");
    }
}
