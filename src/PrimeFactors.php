<?php

declare(strict_types=1);

namespace App;

class PrimeFactors
{

    public function generate(int $number): array
    {
        $factors = [];


        for ($divesor = 2; $number > 1; $divesor++) {
            for (; $number % $divesor === 0; $number /= $divesor) {
                $factors[] = $divesor;
            }
        }

        return $factors;
    }
}