<?php

namespace App;

class RomanNumerals
{

    public const NUMERALS = [
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1,
    ];

    public static function generate(int $number): string|bool
    {
        if ($number <= 0 || $number >= 4000) {
            return false;
        }

        $result = '';

        foreach (static::NUMERALS as $numeral => $arabic) {
            while ($number >= $arabic) {
                $result .= $numeral;

                $number -= $arabic;
            }
        }

        return $result;
    }
}