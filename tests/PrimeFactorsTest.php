<?php


use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{

    /**
     * @test
     * @dataProvider factors
     */
    public function it_generate_prime_factors($number, $expected): void
    {
        $factors = new PrimeFactors();

        $this->assertEquals($expected, $factors->generate($number));
    }


    public function factors(): array
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [8, [2, 2, 2]],
            [100, [2, 2, 5, 5]],
            [999, [3, 3, 3, 37]],
        ];
    }
}
