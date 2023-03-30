<?php

declare(strict_types=1);

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{

    /**
     * @test
     * @dataProvider checks
     */
    public function it_generates_the_roman_numeral_for_a_given_number($number, $numeral): void
    {
        $this->assertEquals($numeral, RomanNumerals::generate($number));
    }

    /** @test */
    public function it_cannot_generate_a_roman_numeral_less_than_1(): void
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /** @test */
    public function it_cannot_generate_a_roman_numeral_more_than_3999(): void
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public static function checks(): array
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
        ];
    }
}
