<?php

namespace App;

class Game
{

    public const FRAME_PER_GAME = 10;
    protected array $rolls = [];

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAME_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->pintCount($roll) + $this->strikeBonus($roll);

                ++$roll;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * @param  int  $roll
     * @return bool
     */
    private function isStrike(int $roll): bool
    {
        return $this->pintCount($roll) === 10;
    }

    /**
     * @param  int  $roll
     * @return bool
     */
    private function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    /**
     * @param  int  $roll
     * @return int
     */
    private function defaultFrameScore(int $roll): int
    {
        return $this->pintCount($roll) + $this->pintCount($roll + 1);
    }

    /**
     * @param  int  $roll
     * @return mixed
     */
    private function strikeBonus(int $roll): int
    {
        return $this->pintCount($roll + 1) + $this->pintCount($roll + 2);
    }

    /**
     * @param  int  $roll
     * @return mixed
     */
    private function spareBonus(int $roll): int
    {
        return $this->pintCount($roll +2);
    }

    protected function pintCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}