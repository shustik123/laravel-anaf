<?php

namespace Andali\Anaf\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ValidVatNumber implements Rule
{
    public function passes($attribute, $value): bool
    {
        return $this->validate($value);
    }

    public function message(): string
    {
        return ':attribute is not a valid VAT ID number.';
    }

    protected function validate(string $vatNumber): bool
    {
        $vatNumber = Str::of($vatNumber)->upper()->remove('RO')->trim()->toString();

        if (Str::length($vatNumber) > 10) {
            return false;
        }

        if (! is_numeric($vatNumber)) {
            return false;
        }
        $vatNumber = (int) $vatNumber;
        if (strlen($vatNumber) > 10) {
            return false;
        }

        $control_number = substr($vatNumber, -1);
        $vatNumber = substr($vatNumber, 0, -1);
        while (strlen($vatNumber) != 9) {
            $vatNumber = '0'.$vatNumber;
        }
        $suma = (int) $vatNumber[0] * 7 + (int) $vatNumber[1] * 5 + (int) $vatNumber[2] * 3 + (int) $vatNumber[3] * 2 + (int) $vatNumber[4] * 1 + (int) $vatNumber[5] * 7 + (int) $vatNumber[6] * 5 + (int) $vatNumber[7] * 3 + (int) $vatNumber[8] * 2;
        $suma = $suma * 10;
        $rest = fmod($suma, 11);
        if ($rest == 10) {
            $rest = 0;
        }

        if ($rest == $control_number) {
            return true;
        }

        return false;
    }
}
